<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanApiController extends Controller
{
    public function index()
    {
        $data = Peminjaman::with('barang')->where('user_id', auth()->id())->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        $peminjaman = Peminjaman::create([
            'user_id' => auth()->id(),
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Peminjaman berhasil dibuat.',
            'data' => $peminjaman
        ]);
    }

    public function pengembalian(Request $request)
    {
        // proses pengembalian (selanjutnya kita buat lebih lengkap)
        return response()->json(['message' => 'Pengembalian dicatat (dummy).']);
    }

    public function laporan()
    {
        $data = Peminjaman::where('user_id', auth()->id())->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
