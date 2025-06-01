<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Elektronik', 'deskripsi' => 'Peralatan elektronik dan teknologi'],
            ['nama' => 'Furniture', 'deskripsi' => 'Perabot dan perlengkapan kantor'],
            ['nama' => 'Alat Tulis', 'deskripsi' => 'Peralatan tulis menulis dan administrasi'],
            ['nama' => 'Olahraga', 'deskripsi' => 'Peralatan dan perlengkapan olahraga'],
            ['nama' => 'Kendaraan', 'deskripsi' => 'Kendaraan dan peralatan transportasi'],
            ['nama' => 'Alat Kebersihan', 'deskripsi' => 'Peralatan kebersihan dan maintenance'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
    