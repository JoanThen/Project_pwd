<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBarang = Barang::count();
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        // $pengembalianHariIni = Peminjaman::whereDate('tanggal_kembali', today())->count();

        return view('dashboard', compact(
            'totalUsers',
            'totalBarang',
            'peminjamanAktif',
            // 'pengembalianHariIni'
        ));
    }
}
