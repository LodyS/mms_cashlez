<?php
namespace App\Traits;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Workflow;
use App\Traits\WorkflowTrait;

trait ManagerOpTrait
{
    use WorkFlowTrait;

    public function manager_op_button_action($row)
    {
        $aksi = '';

        if($row->risk_analis_proses == 'Y' and $row->status_approval == 'Process'):
            $aksi .= tomboll_general('bank-approve', $row->token, 'Proses Data', 'primary');
            $aksi .= tombol_biasa('Acquirer Process', 'secondary');
        else:
            $aksi .= $this->status_internal_merchant($row);
        endif; 

        return $aksi;
    }
}
