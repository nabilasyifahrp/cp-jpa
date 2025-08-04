<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LandingPageController;


Route::get('/', [LandingPageController::class, 'index'])->name('home.jpa');
Route::get('/detail-service/{id}', [DetailServiceController::class, 'show'])->name('service.detail');


//Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    //Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    //Service
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/service/{id}', [ServiceController::class, 'read'])->name('service.read');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
});
