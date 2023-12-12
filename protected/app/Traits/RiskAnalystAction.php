<?php
namespace App\Traits;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Traits\WorkflowTrait;

trait RiskAnalystAction
{
    use WorkflowTrait;

    public function risk_analyst_button_action($row)
    {
        $aksi ='';

        if($row->merchant_op_proses == 'Y' and $row->risk_analis_proses == null  and $row->status_approval == 'Process' or $row->return_risk_analis == 'Y'):
            $aksi .= tomboll_general('proses-risk-analyst', $row->token, 'Proses Data', 'primary');
           
            if($row->return_risk_analis == 'Y'):
                $aksi .= tombol_biasa('Return to Risk Analyst', 'danger');
            else:
                $aksi .= tombol_biasa('Validation', 'secondary');
            endif;

        else:
            $aksi .= $this->status_internal_merchant($row);
        endif;

        return $aksi;
    }
}
