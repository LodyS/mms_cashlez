<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use DataTables;
use App\Models\DataMerchant;
use App\Models\Workflow;
use Illuminate\Http\Request;
use App\Traits\WorkflowTrait;
use App\Traits\RiskAnalystAction;
use App\Traits\MoTrait;
use App\Traits\ManagerOpTrait;

class StatusApprovalController extends Controller
{
    use WorkflowTrait, RiskAnalystAction, MoTrait, ManagerOpTrait;

    public function index(Request $request, $status, $token_applicant)
    {
        $route = 'status-merchant';
        
        if($request->ajax()):
            return Workflow::master_data_status($request, $status, $token_applicant)
            ->addColumn('centang', function($row){
                if(Auth::user()->jabatan->approval_status == 'Yes' and $row->status_approval == 'Process' and $row->risk_analis_proses == 'Y'):
                    $button = '<input type="checkbox" class="sub_chk" data-id="'.$row->id.'">';
                else:
                    $button = '';
                endif;

                return $button;
            })
            ->addColumn('action', function($row){
         
                $aksi = '';
                if(Auth::user()->jabatan->leveling_number == 1): // merchant op
                    $aksi = $this->mo_button_action($row);
                elseif(Auth::user()->jabatan->leveling_number == 2): // risk analis
                    $aksi = $this->risk_analyst_button_action($row);
                elseif(Auth::user()->jabatan->approval_status == 'Yes' and Auth::user()->jabatan->leveling_number == 3): // bank approve
                    $aksi = $this->manager_op_button_action($row);
                endif;

                return $aksi;
            })  
            ->rawColumns(['action', 'status', 'centang'])
            ->make(true);

        endif;

        return view('status-approval/index', compact('status', 'route', 'token_applicant'));
    }   

    public function status(Request $request, $status, $token_applicant)
    {
        if($request->ajax()):
            return DataMerchant::master_data_status($request, $status, $token_applicant)
            ->addColumn('action', function($row){
         
                $aksi = '';

                if(Auth::user()->jabatan->leveling_number == 1): 
                    $aksi .= $this->merchant_operation_kondisi_pra_fitur_pembayaran($row);
                else:
                    $warna = warna_status($row->status_approval);
                    $aksi .= status_internal($row->status_approval,$warna, 'detail-merchant', $row->token_applicant);
                endif; 

                return $aksi;
            })  
            ->rawColumns(['status', 'action'])
            ->make(true);

        endif;

        return view('status-approval/status', compact('status', 'token_applicant'));
    }

    public function show($token_applicant)
    {
        $data = $this->detail_merchant($token_applicant); 

        return view('status-approval/show', compact('data', 'token_applicant'));
    }
}
