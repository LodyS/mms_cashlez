<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Traits\WorkflowTrait;
use App\Models\DataMerchant;
use App\Models\Workflow;
use App\Models\DokumenApplicantDetail;

class RiskAnalystController extends Controller
{
    use WorkflowTrait;

    public function proses($token_applicant)
    {
        $data = $this->detail_merchant($token_applicant); 
        
        return view('status-approval/proses-approval', compact('data', 'token_applicant'));
    }

    public function show($token_applicant)
    {
        $data = $this->detail_merchant($token_applicant); 

        return view('status-approval/show', compact('data', 'token_applicant'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $this->storeHistoriApproval($request); 
    
            $data = Workflow::where('token', $request->token)->first();
          
            if($request->status == 'Direkomendasikan'):
                
                $data->update([
                    'risk_analis_proses'=>'Y', 
                    'catatan'=>'Sudah di proses Risk Analyst', 
                    'return_risk_analis'=>null, 
                    'status_approval'=>'Process'
                ]);

            elseif($request->status == 'Return to Merchant Ops'):
                $this->return_to_merchant_ops($request, $data);
            elseif($request->status == 'Tidak Direkomendasikan'):
                $data->update(['status_approval'=>'Close', 'risk_analis_proses'=>'Y']);
                DataMerchant::where('token_applicant', $data->token_applicant)->update(['status_approval'=>'Close']);
            endif;

            DB::commit();
    
            return redirect()->action('App\Http\Controllers\StatusApprovalController@index', [
                'status'=>'Process', 
                'token_applicant'=>$request->token_applicant
            ])
            ->with('success', 'Berhasil proses data');

        } catch (Exception $e){
            DB::rollback();
            return back()->withError('Gagal proses merchant');
        }
    }
}
