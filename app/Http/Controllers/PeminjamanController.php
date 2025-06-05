<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Tampilkan data terbaru di atas
        $peminjamans = Peminjaman::with(['user', 'barang'])->latest()->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('peminjaman.create', compact('users', 'barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $barang = Barang::find($request->barang_id);

        if ($barang->stock < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi. Stok saat ini: ' . $barang->stock);
        }

        Peminjaman::create([
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'pending',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan.');
    }

   public function approve($id)
{
    $peminjaman = Peminjaman::with('barang')->findOrFail($id);

    // Cek status agar tidak meng-approve ulang
    if ($peminjaman->status !== 'pending') {
        return back()->with('warning', 'Peminjaman sudah diproses sebelumnya.');
    }

    // Cek stok
    if ($peminjaman->barang->stock < $peminjaman->jumlah) {
        return back()->withErrors(['stok' => 'Stok barang tidak cukup. Stok saat ini: ' . $peminjaman->barang->stock]);
    }

    // Update status dan kurangi stok
    $peminjaman->update(['status' => 'approved']);
    $peminjaman->barang->decrement('stock', $peminjaman->jumlah);

    return back()->with('success', 'Peminjaman disetujui dan stok barang dikurangi.');
}

public function reject($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Cek status agar tidak reject ulang
    if ($peminjaman->status !== 'pending') {
        return back()->with('warning', 'Peminjaman sudah diproses sebelumnya.');
    }

    $peminjaman->update(['status' => 'rejected']);

    return back()->with('error', 'Peminjaman ditolak.');
}


    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status === 'selesai') {
            $peminjaman->delete();
            return back()->with('success', 'Riwayat peminjaman dihapus.');
        }

        return back()->with('error', 'Hanya peminjaman yang sudah selesai bisa dihapus.');
    }
}