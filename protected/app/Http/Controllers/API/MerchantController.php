<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\DataMerchant;
use Auth;
use DB;
use App\Models\User;
use App\Models\Workflow;
use App\Http\Requests\MerchantRequest;
use Illuminate\Http\Request;
use Exception;

class MerchantController extends Controller
{
    public function index()
    {
        $data = DataMerchant::with('payment')->where('user_id', auth('sanctum')->user()->id)->get();

        return response()->json(['success'=>true, 'result'=>$data]);
    }

    public function store(MerchantRequest $request)
    {
        DB::beginTransaction();

        try {

            $data = DataMerchant::create($request->validated());
            $input_workflow = Workflow::input_array($request, $data);
    
            DB::commit();
            return response()->json(['success'=>true, 'token_applicant'=>$data->token_applicant, 'message'=>'Berhasil tambah Merchant']);

        } catch(Exception $exception){
            DB::rollback();
            return response()->json(['success'=>false,  'message'=>'Gagal tambah Merchant']);
        }
    }

    public function pengajuan()
    {
        if(User::where('id', auth('sanctum')->user()->id)->value('privilege_user_id') !== "1"):
            return response()->json(['success'=>false, 'message'=>'Anda bukan customer'], 403);
        else:
            return response()->json(['success'=>true, 'result'=>DataMerchant::with('payment')->where('user_id',auth('sanctum')->user()->id)->get()]);
        endif;        
    }
}
