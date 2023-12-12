<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivilegeUser extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'privilege_user';
    protected $fillable = ['leveling_number', 'privilege_title', 'publish', 'sortnumber', 'modified_datetime', 'modified_by', 'approval_status'];

    protected static function boot()
    {
       parent::boot();
    
        static::creating(function ($model) {
            $model->publish = 1;
            $model->sortnumber = $model->max('sortnumber') + 1;
            $model->modified_datetime = date('Y-m-d h:i:s');
            $model->modified_by = Auth::id();
        });
    } 
}
