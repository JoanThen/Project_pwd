<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection
{
    public function collection()
    {
        return Barang::all(); // ambil semua data Barang
    }
}
