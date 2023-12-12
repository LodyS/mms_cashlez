<?php

namespace App\Http\Controllers;
use DB;
use App\Models\DataMerchant;
use App\Models\Workflow;
use App\Traits\WorkflowTrait;
use App\Traits\MoTrait;
use Auth;
use Illuminate\Http\Request;

class ApplicantStatusController extends Controller
{
    use WorkflowTrait, MoTrait;

    public function index(Request $request)
    {
        if($request->ajax()):

            return DataMerchant::master_data_status($request)
            ->addColumn('action', function($row){

                if(Auth::user()->privilege_user_id == 27):
                    $aksi = $this->merchant_operation_kondisi_pra_fitur_pembayaran($row);
                else:
                    $aksi = liat_detail('detail-merchant', $row->token_applicant);
                endif;

                return $aksi;
            })       
            ->rawColumns(['action', 'status'])
            ->make(true);

        endif;

        return view('merchant-operation/index');
    }

    public function list(Request $request, $status)
    {
        if($request->ajax()):

            return DataMerchant::master_data_status($request, $status)
            ->addColumn('action', function($row){

                if(Auth::user()->privilege_user_id == 27):
                    $aksi = $this->merchant_operation_kondisi_pra_fitur_pembayaran($row);
                else:
                    $label_proses = ($row->merchant_op_proses == 'Y') ? 'Validation' : 'Verification';
        
                    $aksi = [
                        'Process'=>status_internal('Process','info', 'detail-merchant', $row->token_applicant),
                        'New Request'=>status_internal('New Request','secondary', 'detail-merchant', $row->token_applicant),
                        'Rejected'=>status_internal('Reject','danger', 'detail-merchant', $row->token_applicant),
                        'Close'=>status_internal('Close','danger', 'detail-merchant', $row->token_applicant),
                        'Updated'=>status_internal('Update', 'info', 'detail-merchant', $row->token_applicant),
                        'Approved'=>status_internal('Approved', 'success', 'detail-merchant', $row->tokan_applicant)
                    ][$row->status_approval];
                    
                endif;

                return $aksi;
            })       
            ->rawColumns(['action', 'status'])
            ->make(true);

        endif;

        return view('merchant-operation/index', compact('status'));
    }
}
