<?php

namespace App\Http\Controllers;
use App\Models\MerchantBranch;
use Auth;
use App\Models\DataMerchant;
use DataTables;
use DB;
use App\Http\Requests\PengajuanEdcRequest;
use Illuminate\Http\Request;
use PDF;

class PengajuanEdcController extends Controller
{
    public function index(Request $request, $token_applicant)
    {
        if($request->ajax()):
            $data = MerchantBranch::where('token_applicant', $token_applicant);

            if($request->filled('from_date') && $request->filled('to_date')):
                $data = $data->whereBetween('created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"]);
            endif;

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function($row){
                return date('d-m-Y', strtotime($row->created_at));
            })
            ->addColumn('alamat', function($row){
                return '<textarea class="form-control" style="background-color:white" readonly>'.$row->alamat.'</textarea>';
            })
            ->addColumn('action', function($row){
         
                $param['token_applicant'] = $row->token_applicant;
                $param['aksi'] = $row->id;

                if($row->status == null and $row->status_approval == 'Approved'):
                    $aksi =tombol_general_dua_param('proses-pengajuan-edc', $param, 'Proses Data', 'primary');
                else:	
                    $aksi = [
                        'Approved'=>tombol_biasa('Approved', 'success'),
                        'Rejected'=>tombol_biasa('Rejected', 'danger'),
                        ''=>tombol_biasa('Process', 'info'),
                    ][$row->status];

                    $aksi .= tombol_general_dua_param('detail-pengajuan-edc', $param, 'Detail', 'primary');
                endif; 

                return $aksi;
            })
            ->rawColumns(['action', 'alamat'])
            ->make(true);

        endif;

        return view('pengajuan-edc/index', compact('token_applicant'));
    }

    public function list(Request $request, $status)
    {
        if($request->ajax()):
            $data = MerchantBranch::query();

            if($request->filled('from_date') && $request->filled('to_date')):
                $data = $data->whereBetween('created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"]);
            endif;

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function($row){
                return date('d-m-Y', strtotime($row->created_at));
            })
            ->addColumn('alamat', function($row){
                return '<textarea class="form-control" style="background-color:white" readonly>'.$row->alamat.'</textarea>';
            })
            ->addColumn('action', function($row){
         
                $param['token_applicant'] = $row->token_applicant;
                $param['aksi'] = $row->id;

                if($row->status == null and $row->status_approval == 'Approved'):
                    $aksi =tombol_general_dua_param('proses-pengajuan-edc', $param, 'Proses Data', 'primary');
                else:	
                    $aksi = [
                        'Approved'=>tombol_biasa('Approved', 'success'),
                        'Rejected'=>tombol_biasa('Rejected', 'danger'),
                        ''=>tombol_biasa('Process', 'info'),
                    ][$row->status];

                    $aksi .= tombol_general_dua_param('detail-pengajuan-edc', $param, 'Detail', 'primary');
                endif; 

                return $aksi;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view('pengajuan-edc/index', compact('token_applicant'));
    }

    public function proses($token_applicant, $id)
    {
        $data['data'] = DataMerchant::where('token_applicant', $token_applicant)->firstOrFail();
        $merchant = MerchantBranch::where('id', $id)->firstOrFail();
       
        return view('pengajuan-edc/proses', compact('token_applicant', 'data', 'id', 'merchant'));
    }

    public function detail($token_applicant, $id)
    {
        $data['data'] = DataMerchant::where('token_applicant', $token_applicant)->first();
        $merchant = MerchantBranch::where('id', $id)->first();
       
        return view('pengajuan-edc/show', compact('token_applicant', 'data', 'id', 'merchant'));
    }

    public function store (PengajuanEdcRequest $request)
    {
        $req = $request->validated();
        $req['user_update'] = Auth::id();
        $update = MerchantBranch::where('id', $request->id)->update($req);

        return redirect('pengajuan-edc/'.$request->token_applicant)->with('success', 'Berhasil update data');
    }

    public function print($token_applicant)
    {
        $data = DataMerchant::with(['merchant_branch'])->where('token_applicant', $token_applicant)->firstOrFail();
 
    	$pdf = PDF::loadview('pengajuan-edc/form-pengajuan-edc', [
            'data'=>$data, 
            'kebutuhan_jumlah_edc'=>MerchantBranch::where('token_applicant', $token_applicant)->sum('kebutuhan_edc'),
            'tanda_tangan'=>DB::table('tanda_tangans')->where('token_applicant', $token_applicant)->value('file')
        ]);

        return $pdf->stream();
    }
}
