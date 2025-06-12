<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\Api\PeminjamanApiController;
use App\Http\Controllers\Api\PengembalianApiController;

Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:user'])->group(function () {

    Route::get('/barangs', [BarangApiController::class, 'index']);

    Route::get('/peminjaman', [PeminjamanApiController::class, 'index']);
    Route::post('/peminjaman', [PeminjamanApiController::class, 'store']);

    Route::post('/pengembalian', [PengembalianApiController::class, 'store']);
    Route::put('/pengembalian/{id}', [PengembalianApiController::class, 'update']); // ✅ Tambah PUT update pengembalian
    Route::get('/pengembalian', [PengembalianApiController::class, 'index']);       // Optional: lihat semua pengembalian
    Route::get('/pengembalian/{id}', [PengembalianApiController::class, 'show']);   // Optional: lihat detail pengembalian

    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/barangs', [BarangApiController::class, 'index']);

    Route::get('/peminjaman', [PeminjamanApiController::class, 'index']);
    Route::post('/peminjaman', [PeminjamanApiController::class, 'store']);
    Route::post('/peminjaman/approve/{id}', [PeminjamanApiController::class, 'approve']);
    Route::post('/peminjaman/reject/{id}', [PeminjamanApiController::class, 'reject']);

    Route::post('/pengembalian', [PengembalianApiController::class, 'store']);
    Route::put('/pengembalian/{id}', [PengembalianApiController::class, 'update']); // ✅ Tambah PUT update pengembalian
    Route::get('/pengembalian', [PengembalianApiController::class, 'index']);       // Optional
    Route::get('/pengembalian/{id}', [PengembalianApiController::class, 'show']);   // Optional
    Route::delete('/pengembalian/{id}', [PengembalianApiController::class, 'destroy']); // Optional

    Route::get('/laporan', [PeminjamanApiController::class, 'laporan']);

    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
