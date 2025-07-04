<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Pengembalian;

class LaporanController extends Controller
{
   public function stok()
{
    $barangs = Barang::all();
    return view('auth.laporan.stok', compact('barangs'));
}

public function laporanPeminjaman()
{
    $peminjamans = Peminjaman::with('barang')->get();
    return view('auth.laporan.peminjaman', compact('peminjamans'));
}

public function laporanPengembalian()
{
    $pengembalians = Pengembalian::with('peminjaman')->get();
    return view('auth.laporan.pengembalian', compact('pengembalians'));
}

}
