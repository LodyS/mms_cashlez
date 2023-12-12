<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $data = DB::table('courier_country')->orderBy('province_name', 'desc')->get();
      
        return response()->json(['status'=>true, 'result'=>$data]);
    }

    public function kabupaten($provinsi)
    {
        $data = DB::table('courier_province')->where('province_id', $provinsi)->get();

        return response()->json(['status'=>true, 'result'=>$data]);
    }

    public function kecamatan($kabupaten)
    {
        $data = DB::table('courier_city')->where('district_id', $kabupaten)->get();

        return response()->json(['status'=>true, 'result'=>$data]);
    }

    public function kelurahan($kecamatan)
    {
        $data = DB::table('courier_kecamatan')->where('subdistrict_id', $kecamatan)->get();

        return response()->json(['status'=>true, 'result'=>$data]);
    }
}
