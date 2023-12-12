<?php

namespace App\Http\Controllers\Api;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\RegisterApiRequest;

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
        $user = User::with(['jabatan'])->where('username', $request->username)->first();

        if(isset($request->password)):
            if(!Auth::attempt($request->only('username', 'password'))):
                return response()->json(['success'=>false, 'message' => 'Wrong password'], 401);
            endif;            
        elseif(isset($request->pin)):
            if(!Hash::check($request->pin, $user->pin)):
                return response()->json(['success'=>false, 'message' => 'Wrong PIN'], 401);
            endif;
        endif;

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'=>true,
            'message'=>'Login success',
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user,
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'logout success']);
    }
}
