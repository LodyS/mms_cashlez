<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenApplicantDetail extends Model
{
    use HasFactory;

    protected $table = 't_document_applicant_detail';
 
    protected $fillable = [
        'id_download',
        'id_document_applicant',
        'photo_path',
        'jenis_pengajuan',
        'catatan',
        'status'
    ];

    public function dokumen_review_merchant()
    {
        return $this->belongsTo(DokumenReview::class, 'id', 'dokumen_id');
    }

    public function dokumen()
    {
        return $this->hasOne(DokumenApplicant::class, 'id', 'id_document_applicant');
    }

    public function foto_lokasi_merchant()
    {
        return $this->hasOne(DokumenApplicant::class, 'id', 'id_document_applicant')->where('label_photo', 'Foto Lokasi Merchant');
    }
}
