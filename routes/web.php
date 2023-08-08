<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;
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
        Route::resource('vendorss', VendorController::class);
        Route::resource('branch', BranchController::class);
        Route::resource('employee', EmployeeController::class);
    });
});
