<?php

namespace App\Http\Controllers\API;
use App\Models\MerchantBranch;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Auth;
use App\Models\DataMerchant;
use App\Http\Requests\MerchantBranchRequest;
use Illuminate\Http\Request;

class MerchantBranchController extends Controller
{
    public function index($token_applicant)
    {
        return response()->json(['status'=>true, 'data'=>MerchantBranch::where('token_applicant', $token_applicant)->get()]);
    }

    public function store(MerchantBranchRequest $request)
    {
        $input = MerchantBranch::create($request->validated());

        return response()->json(['success'=>true, 'message'=>'Berhasil input data', 'data'=>$input]);
    }
}
