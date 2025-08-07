<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;

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

    //Product Dashboard Page
    Route::get('/product-management', function () {
        return view('admin.product.dashboard');
    })->name('product.management');

    //Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //Product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});
