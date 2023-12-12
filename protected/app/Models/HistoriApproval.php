<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriApproval extends Model
{
    use HasFactory;

    protected $table = 'histori_approval';

    public static function histori($token_applicant, $privilege_user)
    {
        return DB::table('histori_approval')->where([
            'token_applicant'=>$token_applicant, 
            'privilege_user_id'=>$privilege_user, 
            'approve_status'=>'N'])
        ->orderBy('id', 'desc')
        ->first();
    }

    public static function histori_fitur($token_applicant, $privilege_user)
    {
        return DB::table('histori_approval')->where([
            'token'=>$token_applicant, 
            'privilege_user_id'=>$privilege_user, 
            'approve_status'=>'N'])
        ->orderBy('id', 'asc')
        ->first();
    }

    public static function approval_fitur($token_applicant)
    {
        return DB::table('histori_approval')
        ->where(['token'=>$token_applicant, 'approve_status'=>'Y'])
        ->orderBy('id', 'asc')
        ->first();
    }

    public static function return_sales($token_applicant)
    {
        return DB::table('histori_approval')
        ->where(['token_applicant'=>$token_applicant])
        ->where('level_status', 'Return Sales Officer')
        ->orWhere('level_status', 'Return To Merchant')
        ->orderBy('id', 'desc')
        ->first();
    }

    public function jabatan_proses()
    {
        return $this->hasOne(PrivilegeUser::class, 'id', 'privilege_user_id');
    }

    public function user_proses()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function payment()
    {
        return $this->hasMany(Workflow::class, 'token', 'token');
    }
}
