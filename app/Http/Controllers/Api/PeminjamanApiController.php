<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; // ← ini yang penting
use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PeminjamanApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized',
                ], 401);
            }

            $peminjamans = Peminjaman::with([
                'user:id,name',
                'barang:id,nama_barang as name,stock'
            ])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Daftar peminjaman user',
                'data' => $peminjamans
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal mengambil data peminjaman: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data peminjaman.',
                'error' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user:id,name', 'barang:id,nama_barang as name,stock'])->find($id);

        if ($peminjaman) {
            return response()->json([
                'status' => true,
                'message' => 'Peminjaman ditemukan',
                'data' => $peminjaman
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman tidak ditemukan'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return response()->json([
                'status' => false,
                'message' => "Stok barang tidak mencukupi"
            ], 400);
        }

        $peminjaman = Peminjaman::create([
            'user_id' => $user->id,
            "nama_peminjam" => $user->name,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
            'tanggal_pinjam' => now()->toDateString(),
            // 'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Peminjaman berhasil diajukan.',
            'data' => $peminjaman,
        ], 201);
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'pending') {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman sudah diproses sebelumnya.'
            ], 400);
        }

        if ($peminjaman->barang->stock < $peminjaman->jumlah) {
            return response()->json([
                'status' => false,
                'message' => 'Stok barang tidak cukup untuk dipinjam.'
            ], 400);
        }

        $peminjaman->status = 'approved';
        $peminjaman->save();
        $peminjaman->barang->decrement('stock', $peminjaman->jumlah);

        return response()->json([
            'status' => true,
            'message' => 'Peminjaman disetujui.'
        ]);
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'pending') {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman sudah diproses sebelumnya.'
            ], 400);
        }

        $peminjaman->status = 'rejected';
        $peminjaman->save();

        return response()->json([
            'status' => true,
            'message' => 'Peminjaman ditolak.'
        ]);
    }
}