<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadFile;
use App\Models\DokumenApplicantDetail;
use App\Models\DokumenApplicant;
use App\Models\DataMerchant;
use App\Http\Requests\UploadDokumenRequest;
use DB;
use Exception;

class UploadDokumenController extends Controller
{
    use UploadFile;

    public function store(UploadDokumenRequest $request)
    {
        DB::beginTransaction();

        try {

            $merchant = DataMerchant::where('id', $request->applicant_id)->first();
           
            $this->update_dokumen_dinamis($request, $merchant);
            $this->update_status_merchant($request, $merchant);
           
            DB::commit();

            return response()->json([
                'success'=>true,
                'message'=>'Berhasil proses upload dokumen',
                'total_upload'=>DokumenApplicant::where('id_credit_type', $merchant->pengajuan_sebagai)->count(),
                'jumlah_upload'=>DokumenApplicantDetail::where(['id_download'=>$merchant->id, 'jenis_pengajuan'=>$merchant->pengajuan_sebagai])->count(),
            ]);

        } catch (\Exception $e){
            DB::rollback();
            throw new Exception("Gagal upload dokumen");
        }
    }
}
