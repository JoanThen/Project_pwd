<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{

    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255',
        ]);

        Kategori::create([
    'nama' => $request->nama_kategori,
]);


        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

   public function update(Request $request, Kategori $kategori)
{
    $request->validate([
        'nama_kategori' => 'required|max:255',
    ]);

   $kategori->update([
    'nama' => $request->nama_kategori,
]);


    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
}


    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
    
}
