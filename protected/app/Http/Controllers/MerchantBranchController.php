<?php

namespace App\Http\Controllers;
use App\Models\MerchantBranch;
use Auth;
use App\Models\DataMerchant;
use DataTables;
use Illuminate\Http\Request;

class MerchantBranchController extends Controller
{
    public function index(Request $request, $token_applicant)
    {
        if($request->ajax()):
            $data = MerchantBranch::with(['user_input'])->where('token_applicant', $token_applicant);

            if($request->filled('from_date') && $request->filled('to_date')):
                $data = $data->whereBetween('created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"]);
            endif;

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('alamat', function($row){
                return '<textarea class="form-control" style="background-color:white" readonly>'.$row->alamat.'</textarea>';
            })
            ->addColumn('tanggal_pengajuan', function($row){
                return date('d-m-Y', strtotime($row->created_at));
            })
            ->addColumn('user_input', function($row){
                return $row->user_input->name ?? '';
            })
            ->rawColumns(['action', 'alamat'])
            ->make(true);

        endif;

        return view('merchant-branch/index', compact('token_applicant'));
    }
}
