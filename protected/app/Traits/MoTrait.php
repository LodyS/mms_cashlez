<?php
namespace App\Traits;
use Storage;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Traits\WorkflowTrait;

trait MoTrait
{
    use WorkflowTrait;

    public function mo_button_action($row)
    {
        $aksi = '';

        if($row->merchant_op_proses == null and $row->status_approval == 'Process' or $row->return_mo_ops == 'Y'):
            
            $aksi .= tomboll_general('proses-persetujuan-mo', $row->token, 'Proses Data', 'primary');
            
            if($row->return_mo_ops == 'Y'):
                $aksi .= tombol_biasa('Return to Merchant Ops', 'danger');
            else:
                $aksi .= tombol_biasa('Verification', 'info');
            endif;

        else:
            $aksi .= $this->status_internal_merchant($row);
        endif; 

        return $aksi;
    }

    public function merchant_operation_kondisi_pra_fitur_pembayaran($row)
    {
        $aksi = '';
        //$status_approval = array('Process', 'Updated');
                    
        if($row->return_sales == null  and $row->status_approval == 'New Request'):
            $aksi .= tomboll_general('proses-mo', $row->token_applicant, 'Proses Data', 'primary');
        elseif($row->return_sales == 'N' and $row->status_approval == 'Updated' and $row->merchant_op_proses == null):
            $aksi .= tomboll_general('proses-mo', $row->token_applicant, 'Proses Data', 'primary');
            $aksi .= status_urgent();
        endif;
   
        $aksi .= [
            'Process'=>status_internal('Process','info', 'detail-merchant', $row->token_applicant),
            'New Request'=>tombol_biasa('New Request','secondary'),
            'Rejected'=>status_internal('Reject','danger', 'detail-merchant', $row->token_applicant),
            'Close'=>status_internal('Close','danger', 'detail-merchant', $row->token_applicant),
            'Updated'=>status_internal('Update', 'info', 'detail-merchant', $row->token_applicant),
            'Approved'=>status_internal('Approved', 'success', 'detail-merchant', $row->token_applicant)
        ][$row->status_approval];
    
        return $aksi;
    }

    function updateProsesMo(Request $request, $update)
    {
        $alasan = $request->alasan ?? '';
        $note = ($alasan !== 'Lainnya') ? $alasan : $request->review;
            
        if($request->status == 'Return Sales Officer' or $request->status == 'Return To Merchant'):
            $update->update(['return_sales'=>'Y', 'status_approval'=>'Rejected', 'catatan'=>$note]);
        elseif($request->status == 'Tidak Direkomendasikan'):
            $update->update(['status_approval'=>'Close']);
            DB::table('workflow')->where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Close', 'merchant_op_proses'=>'Y']);
        elseif($request->status == 'Direkomendasikan'):
            $update->update(['status_approval'=>'Process']);
            DB::table('workflow')->where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Process']);
        elseif($update->risk_analis_proses == null):
            $update->update(['merchant_op_proses'=>'Y', 'return_sales'=>'N','status_approval'=>'Process']);
            DB::table('workflow')->where('token_applicant', $update->token_applicant)->update(['status_approval'=>'Process']);
        endif;
    }
}
