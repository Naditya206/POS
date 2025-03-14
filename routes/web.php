<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriControllerController;
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
    Route::get('/', [UserController::class, 'index']);        // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);       // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);     // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);   // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

// Route::group(['prefix' => 'm_level], function () {
//     Route::get('/', [LevelController::class, 'index']);       
//     Route::post('/list', [LevelController::class, 'list']);    
//     Route::get('/create', [LevelController::class, 'create']); 
//     Route::post('/', [LevelController::class, 'store']);       
//     Route::get('/{id}', [LevelController::class, 'show']);     
//     Route::get('/{id}/edit', [LevelController::class, 'edit']); 
//     Route::put('/{id}', [LevelController::class, 'update']);   
//     Route::delete('/{id}', [LevelController::class, 'destroy']); 
// });

Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index'])->name('level.index');
    Route::post('/list', [LevelController::class, 'list'])->name('level.list');
});
