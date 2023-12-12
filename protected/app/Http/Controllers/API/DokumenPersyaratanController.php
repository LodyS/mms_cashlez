<?php

namespace App\Http\Controllers\API;
use DB;
use App\Models\DataMerchant;
use App\Models\DokumenApplicantDetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\DokumenPersyaratanResource;
use App\Models\DokumenApplicant;
use Illuminate\Http\Request;

class DokumenPersyaratanController extends Controller
{
    public function index(Request $request)
    {
        $tipe_merchant = $request->input('tipe_merchant');
        $data = DB::table('t_document_applicant')->where('id_credit_type', $tipe_merchant)->get();

        return response()->json(['status'=>true, 'result'=>$data]);
    }

    public function dokumenDinamis(Request $request)
    {
        $merchant = DataMerchant::where('token_applicant', $request->token_applicant)->first();

        $judul_dokumen = DokumenApplicant::with(['dokumen_detail'=>function($query) use ($merchant){
            $query->where('id_download', $merchant->id);
        }])
        ->where('id_credit_type', $merchant->pengajuan_sebagai)
        ->get();

        return response()->json(['success'=>true,  'result'=>DokumenPersyaratanResource::collection($judul_dokumen)]);
    }
}
