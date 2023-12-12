<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use Auth;
use App\Traits\WorkflowTrait;
use App\Models\DataMerchant;
use App\Models\Workflow;
use Illuminate\Http\Request;

class ManagerOpsController extends Controller
{
    use WorkflowTrait;

    public function bankApprove($token_applicant)
    {
        $data = $this->detail_merchant($token_applicant); 

        return view('status-approval/proses-approval', compact('data', 'token_applicant'));
    }

    public function bankApproved(Request $request)
    {
        $action = false;

        try {
            $action = DB::transaction(function() use($request){

                $update = Workflow::where('token', $request->token)->first();
               
                $this->storeHistoriApproval($request);
                    
                if($request->status == 'Return to Risk Analyst'):
                    $this->return_to_risk_analis($request, $update);
                else: 
                        
                    $update->update(['status_approval'=>$request->status, 'manager_op_proses'=>'Y']);
        
                    $data_workflow = DB::table('workflow')->select('status_approval')->where('token_applicant', $update->token_applicant)->get();
                    $data_workflow = collect($data_workflow)->pluck('status_approval')->toArray();
                  
                    if(count(array_keys($data_workflow, 'Process')) == 0):
                        if(in_array('Close', $data_workflow)):
                            DataMerchant::where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Close']);
                        endif;
                    endif;
        
                    if(count(array_keys($data_workflow, 'Approved')) == count($data_workflow)):
                        DataMerchant::where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Approved']);
                    endif;

                    if(count(array_keys($data_workflow, 'Close')) == count($data_workflow)):
                        DataMerchant::where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Close']);
                    endif;
                     
                endif;
    
                return true;
            });

        } catch(\Exception $e){
            return back()->withError('Gagal Proses Perpanjangan');
        }
       
        if($action):
            return redirect()->action('App\Http\Controllers\StatusApprovalController@index', [
                'status'=>'Process', 
                'token_applicant'=>$request->token_applicant
            ])
            ->with('success', 'Berhasil Proses Persetujuan');
        endif;
    }

    public function prosesSelected(Request $request)
    {
        Workflow::whereIn('id',explode(",",$request->id))->update(['status_approval'=>$request->status, 'manager_op_proses'=>'Y']);

        $workflow = DB::table('workflow')->whereIn('id', explode(",", $request->id))->get();

        foreach($workflow as $data):
            $token = $data->token;
            $token_applicant = $data->token_applicant;

            $input_histori_approval = DB::table('histori_approval')
            ->insert([
                'token_applicant'=>$token_applicant,
                'level_status'=>$request->status ?? '',
                'user_id'=>Auth::id(),
                'privilege_user_id'=>Auth::user()->privilege_user_id,
                'waktu'=>\Carbon\Carbon::now(),
                'approve_status'=>'Y',
                'token'=>$token ?? ''
            ]);

        endforeach;

        return response()->json(['success'=>"Data berhasil di update."]);
    }
}
