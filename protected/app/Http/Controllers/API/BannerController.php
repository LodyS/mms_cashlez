<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $data = DB::table('banner_ads')->selectRaw('banner_images as images, title, description')->get();

        return response()->json(['status'=>true, 'result'=>BannerResource::collection($data)]);
    }
}
