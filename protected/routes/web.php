<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantOperationController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RiskAnalystController;
use App\Http\Controllers\InventoryControlController;
use App\Http\Controllers\DokumenApplicantController;
use App\Http\Controllers\PengajuanEdcController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrivilegeUserController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StatusApprovalController;
use App\Http\Controllers\MerchantBranchController;
use App\Http\Controllers\ManagerOpsController;
use App\Http\Controllers\ApplicantStatusController;
use App\Http\Controllers\DetailProsesWorkflowController;
use App\Http\Controllers\AlasanController;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('form-pengajuan-edc/{token_applicant}', [PengajuanEdcController::class, 'print'])->name('form-pengajuan-edc');
Route::get('form-pengajuan-merchant/{token_applicant}', [MerchantOperationController::class, 'print'])->name('form-pengajuan-merchant');

Route::middleware(['auth'])->group(function(){

    Route::middleware(['superadmin'])->group(function(){
        Route::resource('bank', BankController::class);
        Route::resource('kategori', KategoriController::class);    
        Route::resource('dokumen-applicant', DokumenApplicantController::class);
        Route::resource('product-type', ProductTypeController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('users', UserController::class);
        Route::resource('privilege-user', PrivilegeUserController::class); 
        Route::resource('region', RegionController::class);
        Route::resource('alasan', AlasanController::class);
    });  

    Route::get('status-merchant/{status}/{token_applicant}', [StatusApprovalController::class, 'index'])->name('status-merchant');
    Route::get('pra-status-merchant/{status}/{token_applicant}', [StatusApprovalController::class, 'status'])->name('pra-status-merchant');
    Route::get('status-approval-detail/{token_applicant}', [StatusApprovalController::class, 'show'])->name('status-approval-detail');
    Route::get('cabang/{token_applicant}', [MerchantBranchController::class, 'index'])->name('cabang');
    Route::resource('applicant-status', ApplicantStatusController::class);
    Route::get('status-permohonan/{status}', [ApplicantStatusController::class, 'list'])->name('status-permohonan');
    Route::get('detail-merchant/{token_applicant}', [DetailProsesWorkflowController::class, 'index'])->name('detail-merchant');

    Route::middleware(['merchant-operation'])->group(function(){
        Route::resource('list-merchant-mo', MerchantOperationController::class)->except(['index', 'show']);
        Route::get('proses-persetujuan-mo/{token_applicant}', [MerchantOperationController::class, 'prosesApproval'])->name('proses-persetujuan-mo');
        Route::get('proses-mo/{token_applicant}', [MerchantOperationController::class, 'proses'])->name('proses-mo');
        Route::post('mo-approval', [MerchantOperationController::class, 'approval'])->name('mo-approval');

        Route::resource('pengajuan-edc', PengajuanEdcController::class)->except(['show']);
        Route::get('pengajuan-edc/{token_applicant}', [PengajuanEdcController::class, 'index'])->name('pengajuan-edc');
        Route::get('proses-pengajuan-edc/{token_applicant}/{id}', [PengajuanEdcController::class, 'proses'])->name('proses-pengajuan-edc');
        Route::get('detail-pengajuan-edc/{token_applicant}/{id}', [PengajuanEdcController::class, 'detail'])->name('detail-pengajuan-edc');
    });

    Route::middleware(['risk-analyst'])->group(function(){
        Route::resource('list-merchant-risk-analyst', RiskAnalystController::class);
        Route::get('proses-risk-analyst/{token_applicant}', [RiskAnalystController::class, 'proses'])->name('proses-risk-analyst');
    });

    Route::middleware(['manager-ops'])->group(function(){
        Route::get('bank-approve/{token_applicant}', [ManagerOpsController::class, 'bankApprove'])->name('bank-approve');
        Route::post('bank-approved', [ManagerOpsController::class, 'bankApproved'])->name('bank-approved');
        Route::post('process-selected', [ManagerOpsController::class, 'prosesSelected'])->name('process-selected');
    });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('optimize:clear');
    $exitCode = Artisan::call('config:clear');

    return 'DONE'; //Return anything
});

Route::get('/migrate', function() {
    \Artisan::call('migrate');
    dd('migrated!');
});

