<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'banner_ads';
    protected $fillable = ['title', 'banner_images', 'description', 'sortnumber', 'modified_datetime', 'modified_by'];

    protected static function boot()
    {
       parent::boot();
    
        static::creating(function ($model) {
            $model->sortnumber = $model->max('sortnumber') + 1;
            $model->modified_datetime = date('Y-m-d h:i:s');
            $model->modified_by = Auth::id();
        });
    } 
}
