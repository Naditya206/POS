<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WelcomeController;


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


Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);        
    Route::post('/list', [UserController::class, 'list']);    
    Route::get('/create', [UserController::class, 'create']); 
    Route::post('/', [UserController::class, 'store']);       
    Route::get('/{id}', [UserController::class, 'show']);     
    Route::get('/{id}/edit', [UserController::class, 'edit']); 
    Route::put('/{id}', [UserController::class, 'update']);   
    Route::delete('/{id}', [UserController::class, 'destroy']); 
});

Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index'])->name('level.index');
    Route::post('/list', [LevelController::class, 'list'])->name('level.list');
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);        
    Route::post('/list', [KategoriController::class, 'list']);    
    Route::get('/create', [KategoriController::class, 'create']); 
    Route::post('/', [KategoriController::class, 'store']);       
    Route::get('/{id}', [KategoriController::class, 'show']);     
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); 
    Route::put('/{id}', [KategoriController::class, 'update']);   
    Route::delete('/{id}', [KategoriController::class, 'destroy']); 
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);         // Halaman daftar barang
    Route::post('/list', [BarangController::class, 'list']);     // Endpoint datatables barang
    Route::get('/create', [BarangController::class, 'create']);  // Form tambah barang
    Route::post('/', [BarangController::class, 'store']);        // Simpan barang baru
    Route::get('/{id}', [BarangController::class, 'show']);      // Detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // Form edit barang
    Route::put('/{id}', [BarangController::class, 'update']);    // Update barang
    Route::delete('/{id}', [BarangController::class, 'destroy']); // Hapus barang
});
