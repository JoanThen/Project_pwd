<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BarangController;

// =================== AUTH ROUTES ===================
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =================== DASHBOARD ===================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// =================== PROTECTED ROUTES (AUTH) ===================
Route::middleware(['auth'])->group(function () {

    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

    // Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');

    // Pendataan dan laporan (tampilan)
    Route::get('/pendataan', function () {
        return view('pendataan');
    })->name('pendataan');

    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');

    // Laporan data
    Route::get('/laporan/stok', [LaporanController::class, 'stok'])->name('laporan.stok');
    Route::get('/laporan/peminjaman', [LaporanController::class, 'laporanPeminjaman'])->name('laporan.peminjaman');
    Route::get('/laporan/pengembalian', [LaporanController::class, 'laporanPengembalian'])->name('laporan.pengembalian');

    // Peminjaman
    Route::resource('/peminjaman', PeminjamanController::class);

    // Kategori
    Route::resource('kategori', KategoriBarangController::class);
    Route::put('/kategori/{kategori}', [KategoriBarangController::class, 'update'])->name('kategori.update');
});

// =================== Fallback ===================
Route::fallback(function () {
    return redirect()->route('login');
});
