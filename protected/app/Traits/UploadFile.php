<?php
namespace App\Traits;
use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DokumenApplicant;
use App\Models\DokumenApplicantDetail;

trait UploadFile
{
    function upload($foto, $foto_lama, $folder, $aksi)
    {
        if($aksi !== 'Hapus'):
            $foto_raw = $foto;
            $foto_file = $foto_raw->getClientOriginalName();
            $foto_file = date('dmyHis').'_'.$foto_file;
            $foto_raw->move(storage_path($folder), $foto_file);
        endif;

        if($aksi == 'Edit'):
            File::delete(storage_path($folder).'/'.$foto_lama);
        endif;

        if($aksi == 'Hapus'):
            File::delete(storage_path($folder).'/'.$foto);
        endif;

        if($aksi !== 'Hapus'):
            return $foto_file;
        endif;
    }

    function update_dokumen_dinamis(Request $request, $merchant)
    {
        $dokumen = DokumenApplicantDetail::where([
            'id_download'=>$request->applicant_id, 
            'id_document_applicant'=>$request->document_id])
        ->first();
    
        if($request->hasFile('photo_path_nasabah')):
            $file = $this->upload($request->file('photo_path_nasabah'), '', 'uploads', 'Tambah');
        endif;
    
        if(isset($dokumen->photo_path) && $request->hasFile('photo_path_nasabah')):
            $foto = str_replace('protected/storage/uploads/', '', $dokumen->photo_path);
            $this->upload($foto, '', 'uploads', 'Hapus');
    
            $dokumen->update(['status'=>'Updated']); // update status di dokumen applicant
        endif;

        DokumenApplicantDetail::updateOrCreate([
            'id_download'=>$request->applicant_id,
            'id_document_applicant'=>$request->document_id
        ],[
            'photo_path'=>'protected/storage/uploads/'.$file,
            'jenis_pengajuan'=>$merchant->pengajuan_sebagai
        ]);
    }

    function update_status_merchant(Request $request, $merchant)
    {
        $total_dokumen_syarat = DokumenApplicant::where('id_credit_type', $merchant->pengajuan_sebagai)->count();
        $jumlah_dokumen_revisi = DokumenApplicantDetail::where('id_download', $merchant->id)->where('status', 'Reject')->count();
        $total_dokumen_terinput = DokumenApplicantDetail::where([
            'id_download'=>$merchant->id, 
            'jenis_pengajuan'=>$merchant->pengajuan_sebagai])
        ->count();
    
        if($total_dokumen_syarat == $total_dokumen_terinput && $merchant->return_sales == null):
            $merchant->update(['dokumen_lengkap'=>'Y']);
        endif;

        if($jumlah_dokumen_revisi == 0 && $merchant->return_sales == 'Y'):
            $merchant->update(['return_sales'=>'N', 'status_approval'=>'Updated']);
        endif;
    }
}
