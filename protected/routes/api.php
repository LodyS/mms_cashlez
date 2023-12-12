<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\MerchantBranchController;
use App\Http\Controllers\API\MerchantController;
use App\Http\Controllers\API\UploadDokumenController;
use App\Http\Controllers\API\DokumenPersyaratanController;
use App\Http\Controllers\API\JenisPembayaranController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BuktiPembayaranController;
use App\Http\Controllers\API\TandaTanganController;
use App\Http\Controllers\API\ProvinsiController;

Route::middleware(['api_key'])->group(function(){

    Route::get('provinsi', [ProvinsiController::class, 'index']);
    Route::get('kabupaten/{provinsi}', [ProvinsiController::class, 'kabupaten']);
    Route::get('kecamatan/{kabupaten}', [ProvinsiController::class, 'kecamatan']);
    Route::get('kelurahan/{kecamatan}', [ProvinsiController::class, 'kelurahan']);

    Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);

    Route::resource('api-bank', BankController::class);
    Route::resource('api-kategori', KategoriController::class);
    Route::resource('api-banner', BannerController::class);
    Route::resource('jenis-pembayaran', JenisPembayaranController::class);

    Route::get('dokumen-persyaratan', [DokumenPersyaratanController::class, 'index']);
    Route::post('dokumen-dinamis', [DokumenPersyaratanController::class, 'dokumenDinamis']);

    Route::get('/merchant-branch/{token_applicant}', [MerchantBranchController::class, 'index']);
    Route::post('merchant-branch/store', [MerchantBranchController::class, 'store']);

    Route::post('store-pre-register', [UserController::class, 'preRegister']);

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('upload-tanda-tangan', TandaTanganController::class); 
    
    Route::middleware('auth:sanctum')->group(function () {    
        Route::get('list-merchant', [MerchantController::class, 'index']);
        Route::apiResource('merchant', MerchantController::class)->except(['index']);
        Route::get('pengajuan-merchant', [MerchantController::class, 'pengajuan']);

        Route::apiResource('upload-dokumen', UploadDokumenController::class);
        Route::apiResource('upload-bukti-pembayaran', BuktiPembayaranController::class); 
       

        Route::post('/logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
    });  
});
