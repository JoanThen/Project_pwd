<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); // Fetch all barang from the database
        return view('barang.index', compact('barangs')); // Pass the data to the view
    }
}
