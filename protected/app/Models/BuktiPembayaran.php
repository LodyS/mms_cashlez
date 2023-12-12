<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'deskripsi', 'token_applicant', 'user_id'];

    protected static function boot()
    {
       parent::boot();
    
        static::creating(function ($model) {
            $model->user_id = auth('sanctum')->user()->id;
        });
    } 
}
