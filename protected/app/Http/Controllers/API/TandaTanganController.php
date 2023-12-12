<?php
namespace App\Http\Controllers\API;
use App\Models\TandaTangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TandaTanganRequest;
use App\Http\Resources\TandaTanganResource;
use File;
use App\Models\DataMerchant;
use App\Traits\UploadFile;

class TandaTanganController extends Controller
{
    use UploadFile;
       
    public function index ()
    {

    }

    public function show ($token_applicant)
    {
        $data = TandaTangan::where('token_applicant', $token_applicant)->get();

        return response()->json(['success'=>true, 'result'=>TandaTanganResource::collection($data)]);
    } 

    public function store(TandaTanganRequest $request)
    {
        $data = DataMerchant::where('token_applicant', $request->token_applicant)->first();

        if(!$data):
            return response()->json(['success'=>false, 'message'=>'Merchant tidak ada'], 404);
        endif;

        if ($request->hasFile('file')):
            $file = $this->upload($request->file('file'), '', 'tanda_tangan', 'Tambah');
        endif;
        
        $req = $request->validated();
        $req['file'] = $file;
        $req['token_applicant'] = $request->token_applicant;

        TandaTangan::create($req);

        $data->update(['status_tanda_tangan'=>'Y']);

        return response()->json(['success'=>true, 'message'=>'Berhasil upload dokumen tanda tangan']);
    }
}
