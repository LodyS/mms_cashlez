<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Resources\KategoriResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>true, 'result'=>KategoriResource::collection(DB::table('kategori')->get())]) ;
    }
}
