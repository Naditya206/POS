<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriControllerController;

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
Route::get('/kategori', [KategoriController::class,'index']);
Route::get('/user', [UserController::class,'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);


