<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $peminjamans = Peminjaman::with('barang')->get();
    return view('peminjaman.index', compact('peminjamans'));
}

public function create()
{
    $barangs = Barang::all();
    return view('peminjaman.create', compact('barangs'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_peminjam' => 'required',
        'barang_id' => 'required',
        'jumlah' => 'required|integer',
        'tanggal_pinjam' => 'required|date',
    ]);

    Peminjaman::create($request->all());
    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman ditambahkan');
}

}
