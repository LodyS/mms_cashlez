<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hash;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'privilege_user_id',
        'image_profile',
        'phone_number',
        'pin',
        'referal_code',
        'kewarganegaraan',
        'pertanyaan',
        'jawaban',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'pin'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function username($id)
    {
        $data = User::where('id', $id)->first();

        return $data;
    }

    public static function jabatan_user($id)
    {
        return DB::table('privilege_user')->where('id', $id)->first();
    }

    public function jabatan()
    {
        return $this->hasOne(PrivilegeUser::class,  'id', 'privilege_user_id',);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setPinAttribute($value)
    {
        $this->attributes['pin'] = Hash::make($value);
    }

    public function setJawabanAttribute($value)
    {
        $this->attributes['jawaban'] = Hash::make($value);
    }
}
