<?php

namespace App\Http\Controllers\API;
use App\Models\BuktiPembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuktiPembaayaranRequest;
use App\Http\Resources\BuktiPembayaranResource;
use App\Traits\UploadFile;

class BuktiPembayaranController extends Controller
{
    use UploadFile;

    public function index ()
    {

    }

    public function show ($token_applicant)
    {
        $data = BuktiPembayaran::where('token_applicant', $token_applicant)->first();

        return response()->json(['success'=>true, 'result'=>BuktiPembayaranResource::collection($data)]);
    } 

    public function store(BuktiPembaayaranRequest $request)
    {
        if ($request->hasFile('foto')):
            $foto = $this->upload($request->file('foto'), '', 'bukti_pembayaran', 'Tambah');
        endif;

        $req = $request->validated();
        $req['foto'] = $foto ?? '';
   
        BuktiPembayaran::create($req);

        return response()->json(['success'=>true, 'message'=>'Berhasil upload dokumen pembayaran']);
    }
}
