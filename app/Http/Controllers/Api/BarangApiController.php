<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangApiController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return response()->json([
            'success' => true,
            'data' => $barangs
        ]);
    }
}
    