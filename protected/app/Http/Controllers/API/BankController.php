<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Resources\BankResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>true, 'result'=>BankResource::collection(DB::table('t_bank_slik_data')->get())]);
    }
}
