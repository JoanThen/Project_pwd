<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController; // ✅ Tambahan ini

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Only for authenticated users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // === Barang ===
    Route::resource('barang', BarangController::class);

    // === Pengguna ===
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    // routes/web.php
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');


    // === Tampilan Statis ===
    Route::view('/pendataan', 'pendataan')->name('pendataan');
    Route::view('/laporan', 'laporan')->name('laporan');

    // === Laporan Dinamis ===
    Route::get('/laporan/stok', [LaporanController::class, 'stok'])->name('laporan.stok');
    Route::get('/laporan/peminjaman', [LaporanController::class, 'laporanPeminjaman'])->name('laporan.peminjaman');
    Route::get('/laporan/pengembalian', [LaporanController::class, 'laporanPengembalian'])->name('laporan.pengembalian');

    // === Kategori Barang ===
    Route::resource('kategori', KategoriBarangController::class);
    Route::put('/kategori/{kategori}', [KategoriBarangController::class, 'update'])->name('kategori.update');

    // === Peminjaman & Pengembalian ===
    Route::resource('peminjaman', PeminjamanController::class);
    Route::post('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    Route::post('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

    Route::resource('pengembalian', PengembalianController::class);
});

/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect()->route('login');
});