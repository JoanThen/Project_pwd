<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\Api\PeminjamanApiController;

/*
|--------------------------------------------------------------------------
| API Routes - Mobile User Only (Role: user)
|--------------------------------------------------------------------------
*/

// Login untuk user mobile
Route::post('/login', [AuthApiController::class, 'login']);

// Semua endpoint berikut hanya bisa diakses jika login & role = user
Route::middleware(['auth:sanctum', 'role:user'])->group(function () {

    Route::post('/logout', [AuthApiController::class, 'logout']);

    // List barang
    Route::get('/barangs', [BarangApiController::class, 'index']);

    // Peminjaman
    Route::get('/peminjaman', [PeminjamanApiController::class, 'index']);
    Route::post('/peminjaman', [PeminjamanApiController::class, 'store']);

    // Pengembalian
    Route::post('/pengembalian', [PeminjamanApiController::class, 'pengembalian']);

    // Laporan peminjaman
    Route::get('/laporan', [PeminjamanApiController::class, 'laporan']);

    // Info user aktif
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
