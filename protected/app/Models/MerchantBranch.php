<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_applicant', 
        'alamat', 
        'user_id', 
        'kebutuhan_edc', 
        'status', 
        'catatan', 
        'user_update', 
        'alamat_pengiriman',
        'nama_pic',
        'no_tlp_pic',
        'tipe',
        'nomor_seri'
    ];

    protected static function boot()
    {
       parent::boot();
    
       static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    } 
   
    public function merchant()
    {
        return $this->belongsTo(DataMerchant::class, 'token_applicant', 'token_applicant');
    }

    public function user_input()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
