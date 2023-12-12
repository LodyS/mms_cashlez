<?php

namespace App\Models;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenApplicant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 't_document_applicant';

    protected $fillable = ['id_credit_type', 'label_photo', 'mandatory_field', 'sortnumber', 'modified_datetime', 'modified_by'];

    protected static function boot()
    {
       parent::boot();
    
        static::creating(function ($model) {
            $model->sortnumber = $model->max('sortnumber') + 1;
            $model->modified_datetime = date('Y-m-d h:i:s');
            $model->modified_by = Auth::id();
        });
    } 

    public static function nama_dokumen($id)
    {
        return DB::table('t_document_applicant')->where('id', $id)->value('label_photo');
    }

    public function dokumen_detail()
    {
        return $this->hasOne(DokumenApplicantDetail::class, 'id_document_applicant', 'id');
    }
}
