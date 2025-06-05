<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        $barangs = $query->with('kategori')->get();
        $kategoris = Kategori::all(); // Untuk filter dropdown

        return view('barang.index', compact('barangs', 'kategoris'));
    }

   public function create()
{
    $kategoris = \App\Models\KategoriBarang::all(); // ambil semua kategori
    return view('barang.create', compact('kategoris'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori_barangs,id',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'kategori_id', 'stok']);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/barangs', $filename);
            $data['foto'] = $filename;
        }

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

   public function edit(Barang $barang)
{
    $kategoris = \App\Models\KategoriBarang::all(); // Samakan dengan create()
    return view('barang.edit', compact('barang', 'kategoris'));
}


    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori_barangs,id',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'kategori_id', 'stok']);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && Storage::exists('public/barangs/' . $barang->foto)) {
                Storage::delete('public/barangs/' . $barang->foto);
            }

            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/barangs', $filename);
            $data['foto'] = $filename;
        }

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        // Hapus foto jika ada
        if ($barang->foto && Storage::exists('public/barangs/' . $barang->foto)) {
            Storage::delete('public/barangs/' . $barang->foto);
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}