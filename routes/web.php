<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['role:ADMIN-HCM'])->group(function () {
        Route::resource('users', UserController::class);

        Route::resource('regions', RegionController::class);
        Route::resource('penyedia', VendorController::class);
        Route::resource('branch', BranchController::class);

        Route::get('biodata/office-boy', [BiodataController::class, 'office_boy'])->name('bio.ob');
        Route::get('biodata/security', [BiodataController::class, 'security'])->name('bio.security');
        Route::post('biodata/download', [BiodataController::class, 'download'])->name('bio.download');
        Route::post('biodata/upload', [BiodataController::class, 'upload'])->name('bio.upload');


        Route::get('payroll/office-boy', [PayrollController::class, 'office_boy'])->name('payroll.ob');
        Route::get('payroll/security', [PayrollController::class, 'security'])->name('payroll.security');
        Route::post('payroll/download', [PayrollController::class, 'download'])->name('payroll.download');
        Route::post('payroll/upload', [PayrollController::class, 'upload'])->name('payroll.upload');

        Route::resource('report', ReportController::class);
    });
});
