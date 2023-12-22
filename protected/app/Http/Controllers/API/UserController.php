<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PrivilegeUser;
use App\Http\Requests\PreRegisterRequest;

class UserController extends Controller
{
    public function preRegister(PreRegisterRequest $request)
    {
        $input = User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'password'=>$request->password,
            'pin'=>$request->pin,
            'referal_code'=>$request->referal_code,
            'kewarganegaraan'=>$request->kewarganegaraan,
            'merchant_client'=>'Y',
            'privilege_user_id'=>PrivilegeUser::whereId(1)->value('id'),
            'pertanyaan'=>$request->pertanyaan,
            'jawaban'=>$request->jawaban
        ]);

        return response()->json(['status'=>true, 'message'=>'Berhasil simpan data pre register']);
    }
}
