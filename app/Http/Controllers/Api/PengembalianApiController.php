<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengembalianApiController extends Controller
{
    // Ambil semua data pengembalian
    public function index()
    {
        $data = Pengembalian::with(['peminjaman.user', 'peminjaman.barang'])->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    // Simpan data pengembalian baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'tanggal_pengembalian' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $peminjaman = Peminjaman::find($request->peminjaman_id);

        // Cek apakah sudah dikembalikan sebelumnya
        if ($peminjaman->status === 'selesai') {
            return response()->json(['success' => false, 'message' => 'Barang sudah dikembalikan.'], 400);
        }

        // Update status peminjaman
        $peminjaman->update(['status' => 'selesai']);

        // Tambah stok barang kembali
        $peminjaman->barang->increment('stock', $peminjaman->jumlah);

        // Simpan data pengembalian
        $pengembalian = Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json(['success' => true, 'data' => $pengembalian], 201);
    }

    // Tampilkan detail pengembalian
    public function show($id)
    {
        $pengembalian = Pengembalian::with(['peminjaman.user', 'peminjaman.barang'])->find($id);

        if (!$pengembalian) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $pengembalian]);
    }

    // Update data pengembalian
    public function update(Request $request, $id)
    {
        $pengembalian = Pengembalian::find($id);

        if (!$pengembalian) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'tanggal_pengembalian' => 'sometimes|date',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $pengembalian->update($request->only(['tanggal_pengembalian', 'keterangan']));

        return response()->json(['success' => true, 'data' => $pengembalian]);
    }

    // Hapus data pengembalian
    public function destroy($id)
    {
        $pengembalian = Pengembalian::find($id);

        if (!$pengembalian) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $pengembalian->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
