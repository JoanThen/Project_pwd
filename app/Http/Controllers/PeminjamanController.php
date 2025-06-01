<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan semua data peminjaman.
     */
    public function index()
    {
        $data = Peminjaman::with(['barang', 'user', 'approvedBy'])->latest()->get();
        return view('peminjaman.index', compact('data'));
    }

    /**
     * Menampilkan form untuk membuat peminjaman baru.
     */
    public function create()
    {
        $barangs = Barang::where('stok', '>', 0)->get(); // Hanya barang yang masih ada stok
        return view('peminjaman.create', compact('barangs'));
    }

    /**
     * Menyimpan data peminjaman baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        // Cek apakah stok mencukupi
        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->stok]);
        }

        Peminjaman::create([
            'user_id' => auth()->id(),
            'nama_peminjam' => $request->nama_peminjam,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'pending'
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan dan menunggu persetujuan.');
    }

    /**
     * Menampilkan form edit peminjaman.
     */
    public function edit(Peminjaman $peminjaman)
    {
        // Hanya bisa edit jika status masih pending
        if ($peminjaman->status !== 'pending') {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman yang sudah diproses tidak dapat diedit.');
        }

        $barangs = Barang::where('stok', '>', 0)->get();
        return view('peminjaman.edit', compact('peminjaman', 'barangs'));
    }

    /**
     * Mengupdate data peminjaman.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        // Hanya bisa update jika status masih pending
        if ($peminjaman->status !== 'pending') {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman yang sudah diproses tidak dapat diedit.');
        }

        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        // Cek apakah stok mencukupi
        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->stok]);
        }

        $peminjaman->update($request->only(['nama_peminjam', 'barang_id', 'jumlah', 'tanggal_pinjam']));

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Menghapus data peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // Hanya bisa hapus jika status masih pending
        if ($peminjaman->status !== 'pending') {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman yang sudah diproses tidak dapat dihapus.');
        }

        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    /**
     * Approve peminjaman
     */
    public function approve(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'keterangan' => 'nullable|string|max:500'
        ]);

        // Cek apakah stok masih mencukupi
        $barang = $peminjaman->barang;
        if ($barang->stok < $peminjaman->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk menyetujui peminjaman ini.');
        }

        // Update status peminjaman
        $peminjaman->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => auth()->id(),
            'keterangan' => $request->keterangan
        ]);

        // Kurangi stok barang
        $barang->decrement('stok', $peminjaman->jumlah);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disetujui.');
    }

    /**
     * Reject peminjaman
     */
    public function reject(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'keterangan' => 'required|string|max:500'
        ]);

        $peminjaman->update([
            'status' => 'rejected',
            'approved_at' => now(),
            'approved_by' => auth()->id(),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditolak.');
    }
}