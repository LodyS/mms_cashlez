<?php

namespace App\Traits;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\DataMerchant;
use App\Models\Workflow;
use App\Models\DokumenApplicantDetail;

trait WorkflowTrait
{
    function updateStatusDokumen(Request $request)
    {
        $jumlah = count($request->id);
        for ($i=0; $i<$jumlah; $i++):

            DB::table('t_document_applicant_detail')
            ->where('id', $request->id[$i])
            ->update([
                'catatan'=>$request->catatan[$i] ?? '',
                'status'=>$request->rekomendasi_status[$i] ?? '',
                'updated_at'=>\Carbon\Carbon::now(),
            ]);

        endfor;
    }

    function storeDokumenReview(Request $request)
    {
        $jumlah = count($request->id);
        for($i=0; $i<$jumlah; $i++):
    
            DB::table('dokumen_review')
            ->insert([
                'token_applicant'=>$request->token_applicant ?? '',
                'catatan'=>$request->catatan[$i] ?? '',
                'dokumen_id'=>$request->id[$i] ?? '',
                'status'=>$request->rekomendasi_status[$i] ?? '',
                'user_id'=>Auth::id(),
                'waktu'=>\Carbon\Carbon::now(),
            ]);

        endfor;
    }

    function storeHistoriApproval(Request $request)
    {
        $input_histori_approval = DB::table('histori_approval')
        ->insert([
            'token_applicant'=>$request->token_applicant,
            'review'=>$request->review ?? '',
            'level_status'=>$request->status ?? '',
            'alasan'=>$request->alasan ?? '',
            'user_id'=>Auth::id(),
            'privilege_user_id'=>Auth::user()->privilege_user_id,
            'waktu'=>\Carbon\Carbon::now(),
            'approve_status'=>$request->approve_status,
            'token'=>$request->token ?? ''
        ]);
    }

    function showDetailProses($token_applicant)
    {
        $data['data'] = DataMerchant::with(
            'histori_approval',
            'histori_approval.payment',
            'dokumen_merchant',
            'dokumen_merchant.dokumen',
            'dokumen_merchant.dokumen_review_merchant',
            'dokumen_merchant.dokumen_review_merchant.user_proses',
            'dokumen_merchant.foto_lokasi_merchant'
        )
        ->where('token_applicant', $token_applicant)
        ->firstOrFail();

        $data['foto_lokasi_merchant'] = DB::table('t_document_applicant_detail')
        ->leftJoin('t_document_applicant', 't_document_applicant.id', 't_document_applicant_detail.id_document_applicant')
        ->where('id_download', $data['data']->id)
        ->where('label_photo', 'Foto lokasi merchant')
        ->get();

        $data['alasan'] = DB::table('alasans')->get();
   
        return $data;
    }

    function detail_merchant($token_applicant)
    {
        $data['fitur'] = Workflow::where('token', $token_applicant)->firstOrFail();

        $data['data'] = DataMerchant::with(
            'dokumen_merchant',
            'dokumen_merchant.dokumen',
            'dokumen_merchant.dokumen_review_merchant',
            'dokumen_merchant.dokumen_review_merchant.user_proses',
            'dokumen_merchant.foto_lokasi_merchant'
        )
        ->where('token_applicant', $data['fitur']->token_applicant)
        ->firstOrFail();

        $data['foto_lokasi_merchant'] = DB::table('t_document_applicant_detail')
        ->leftJoin('t_document_applicant', 't_document_applicant.id', 't_document_applicant_detail.id_document_applicant')
        ->where('id_download', $data['data']->id)
        ->where('label_photo', 'Foto lokasi merchant')
        ->get();

        $histori = DB::table('histori_approval')->where(['token'=>'', 'token_applicant'=>$data['fitur']->token_applicant]);
        $data['persetujuan'] = DB::table('histori_approval')
        ->where([
            'token'=>$token_applicant, 
            'token_applicant'=>$data['fitur']->token_applicant])
        ->unionAll($histori)
        ->get()
        ->sortBy('id');

        $data['alasan'] = DB::table('alasans')->get();

        return $data;
    }

    public function return_to_merchant_ops(Request $request, $data)
    {
        $data->update([
            'status_approval'=>'Rejected',
            'merchant_op_proses'=>null,
            'risk_analis_proses'=>null,
            'return_mo_ops'=>'Y'
        ]);
    }

    public function return_to_risk_analis(Request $request, $update)
    {
        $update->update([
            'status_approval'=>'Rejected',
            'risk_analis_proses'=>null,
            'return_risk_analis'=>'Y'
        ]);
    }

    public function status_internal_merchant($row)
    {  
        $aksi = '';
        if($row->status_approval == 'Process'):
            
            if($row->risk_analis_proses == null and $row->merchant_op_proses == null):
                $aksi = status_internal('Verification', 'secondary', 'status-approval-detail', $row->token);
            elseif($row->risk_analis_proses == null and $row->merchant_op_proses == 'Y'):
                $aksi = status_internal('Validation', 'secondary', 'status-approval-detail', $row->token);
            elseif($row->risk_analis_proses == 'Y'):
                $aksi = status_internal('Acquirer Process', 'secondary', 'status-approval-detail', $row->token);
            endif;

        endif;

        if($row->status_approval == 'Approved'):
            $aksi = status_internal('Approve', 'success', 'status-approval-detail', $row->token);
        endif;

        if($row->status_approval == 'Close'):
            $aksi = status_internal('Close', 'danger', 'status-approval-detail', $row->token);
        endif;

        // statusnya rejected
        if($row->status_approval == 'Rejected'):
            if($row->return_mo_ops == 'Y'):
                $aksi = status_internal('Return to Merchant Ops', 'danger', 'status-approval-detail', $row->token);
            endif;

            if($row->return_risk_analis == 'Y'):
                $aksi = status_internal('Return to Risk Analyst', 'danger', 'status-approval-detail', $row->token);
            endif; 
        endif;

        return $aksi;
    }
}