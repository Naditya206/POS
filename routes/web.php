<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/{category}', [ProductController::class, 'category']);
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

Route::get('/penjualan', [SalesController::class, 'index']);

Route::get('/products', function () {
    return view('products.index');
});

// Route dengan prefix category
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', function () {
        return 'Halaman Food & Beverage';
    });
    
    Route::get('/beauty-health', function () {
        return 'Halaman Beauty & Health';
    });
    
    Route::get('/home-care', function () {
        return 'Halaman Home Care';
    });
    
    Route::get('/baby-kid', function () {
        return 'Halaman Baby & Kid';
    });
});

Route::get('/user/{id}/name/{name}', function ($id, $name) {
    return view('user.profile', ['id' => $id, 'name' => $name]);
});

Route::get('/level', [LevelController::class,'index']);