<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\DataMerchant;
use App\Models\DokumenApplicantDetail;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\Workflow;
use App\Traits\WorkflowTrait;
use App\Traits\MoTrait;
use PDF;

class MerchantOperationController extends Controller
{
    use WorkflowTrait, MoTrait;

    public function proses($token_applicant)
    {
        $data = $this->showDetailProses($token_applicant); 
        
        return view('merchant-operation/proses', compact('data', 'token_applicant'));
    }

    public function prosesApproval($token_applicant)
    {
        $data = $this->detail_merchant($token_applicant); 
        
        return view('status-approval/proses-approval', compact('data', 'token_applicant'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            
            $update = DataMerchant::where('token_applicant', $request->token_applicant)->first();

            if($update->risk_analis_proses == null):
                $this->updateStatusDokumen($request); // update t_document_applicant_detail
                $this->storeDokumenReview($request); // insert dokumen review
            endif;

            $this->storeHistoriApproval($request); // insert history approval
            $this->updateProsesMo($request, $update); // update status merchant 
    
            DB::commit();
            return redirect('applicant-status')->with('success', 'Berhasil proses data');

        } catch (Exception $e){
            DB::rollback();
            return back()->withError('Gagal proses merchant');
        }
    } // proses sebelum approval fitur pembayaran 

    public function approval(Request $request)
    {
        DB::beginTransaction();
      
        try {

            $update = Workflow::where('token', $request->token)->first();
            
            $this->storeHistoriApproval($request);

            if($request->status == 'Tidak Direkomendasikan'):
                $update->update(['merchant_op_proses'=>'Y', 'status_approval'=>'Close']);
                //DataMerchant::where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Close']);
            else:
                $update->update(['merchant_op_proses'=>'Y', 'status_approval'=>'Process', 'return_mo_ops'=>null]);
                DataMerchant::where('token_applicant', $update->token_applicant)->update(['merchant_op_proses'=>'Y']);
            endif;

            DB::commit();
            return redirect()->action('App\Http\Controllers\StatusApprovalController@index',
                [
                    'status'=>'Process', 
                    'token_applicant'=>$request->token_applicant
                ])
            ->with('success', 'Berhasil proses data');

        } catch (Exception $e){
            DB::rollback();
            return back()->withError('Gagal proses merchant');
        }
    }

    public function print($token_applicant)
    {
        $data = DataMerchant::where('token_applicant', $token_applicant)->firstOrFail();
	    $tanda_tangan = DB::table('tanda_tangans')->where('token_applicant', $token_applicant)->value('file');
	  
    	//$pdf = PDF::loadview('merchant-operation/form-pengajuan-merchant', [
          //  'data'=>$data, 
            //'tanda_tangan'=>DB::table('tanda_tangans')->where('token_applicant', $token_applicant)->value('file')
        //]);

        //return $pdf->stream();

	    return view('merchant-operation/form-pengajuan-merchant', compact('data', 'tanda_tangan'));
    }
}
