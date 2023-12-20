<?php

namespace App\Http\Controllers\Api;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\RegisterApiRequest;
use App\Http\Requests\ResetPasswordRequest;

class AuthController extends Controller
{
    public function register(RegisterApiRequest $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'username'=>$request->username,
            'privilege_user_id'=>$request->privilege_user_id
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data'=>$user,
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    }

    public function login(LoginApiRequest $request)
    {
        $user = User::with(['jabatan'])->where(DB::raw('BINARY `username`'), $request->username)->first();
        $username = $user->username ?? '20231220tidakadausername';

        if(isset($request->password)):
            if(!Auth::attempt($request->only('username', 'password'))):
                return response()->json(['success'=>false, 'message' => 'Wrong password'], 401);
            endif;            
        elseif(isset($request->pin)):
            if(!Hash::check($request->pin, $user->pin)):
                return response()->json(['success'=>false, 'message' => 'Wrong PIN'], 401);
            endif;
        endif;

        if($username == '20231220tidakadausername'):
            return response()->json(['success'=>false, 'message'=>'Wrong username'],401);
        else:
            $token = $user->createToken('auth_token')->plainTextToken;
        endif;

        return response()->json([
            'success'=>true,
            'message'=>'Login success',
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth('sanctum')->user()->id)->first();

        $user->update([
            'name'=>($request->name !== null) ? $request->name : $user->name,
            'username'=>($request->username !== null) ? $request->username : $user->username,
            'email'=>($request->email !== null) ? $request->email : $user->email, 
            'phone_number'=>($request->phone_number !== null) ? $request->phone_number : $user->phone_number, 
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil update profil'
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('id', auth('sanctum')->user()->id)->first();

        if($request->password !== null):
            $user->update(['password'=>$request->password]);
        endif;

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil ubah password'
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
	    $user = User::where('username', $request->username)->first();

        if($user->pertanyaan == $request->pertanyaan && Hash::check($request->jawaban, $user->jawaban)):
            $user->update([
            	'password'=>'default_password'
            ]);

            return response()->json(['success'=>true, 'message'=>'Berhasil reset password']);
        else:
            return response()->json(['success'=>false, 'message'=>'Gagal reset password', 'data'=>$user]);
        endif;
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'logout success']);
    }
}
