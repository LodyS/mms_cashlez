<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\JenisPembayaranResource;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>true, 
            'result'=>JenisPembayaranResource::collection(DB::table('t_product_type')->get())
        ]);
    }
}
