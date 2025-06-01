<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Menampilkan semua data pengembalian
     */
    public function index()
    {
        $data = Pengembalian::with('peminjaman')->get();
        return view('pengembalian.index', compact('data'));
    }

    /**
     * Menampilkan form tambah pengembalian
     */
    public function create()
    {
        $peminjaman = Peminjaman::doesntHave('pengembalian')->get();
        return view('pengembalian.create', compact('peminjaman'));
    }

    /**
     * Menyimpan data pengembalian ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'tanggal_pengembalian' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dicatat.');
    }

    /**
     * Menampilkan form edit pengembalian
     */
    public function edit(Pengembalian $pengembalian)
    {
        $peminjaman = Peminjaman::all();
        return view('pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Memperbarui data pengembalian di database
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'tanggal_pengembalian' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $pengembalian->update([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }

    /**
     * Menghapus data pengembalian
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil dihapus.');
    }
}
