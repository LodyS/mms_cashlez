<?php

namespace App\Http\Controllers;
use App\Traits\WorkflowTrait;
use Illuminate\Http\Request;

class DetailProsesWorkflowController extends Controller
{
    use WorkflowTrait;

    public function index($token_applicant)
    {
        $data = $this->showDetailProses($token_applicant); 

        return view('merchant-operation/show', compact('data', 'token_applicant'));
    }
}
