<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportBarang()
    {
        return Excel::download(new BarangExport, 'data-barang.xlsx');
    }
}

