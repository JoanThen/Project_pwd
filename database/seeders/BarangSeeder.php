<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan kategori sudah ada
        $elektronik = Kategori::where('nama_kategori', 'Elektronik')->first();
        $furniture = Kategori::where('nama_kategori', 'Furniture')->first();
        $alatTulis = Kategori::where('nama_kategori', 'Alat Tulis')->first();
        $olahraga = Kategori::where('nama_kategori', 'Olahraga')->first();
        $kendaraan = Kategori::where('nama_kategori', 'Kendaraan')->first();
        $kebersihan = Kategori::where('nama_kategori', 'Alat Kebersihan')->first();

        $barangs = [
            // Elektronik
            [
                'nama' => 'Laptop Dell Inspiron 15',
                'deskripsi' => 'Laptop dengan processor Intel Core i5, RAM 8GB, SSD 256GB',
                'kategori_id' => $elektronik->id,
                'stok' => 5
            ],
            [
                'nama' => 'Proyektor Epson EB-X06',
                'deskripsi' => 'Proyektor XGA dengan resolusi 1024x768, brightness 3600 lumens',
                'kategori_id' => $elektronik->id,
                'stok' => 3
            ],
            [
                'nama' => 'Printer Canon Pixma G2010',
                'deskripsi' => 'Printer inkjet all-in-one dengan sistem tinta isi ulang',
                'kategori_id' => $elektronik->id,
                'stok' => 2
            ],

            // Furniture
            [
                'nama' => 'Meja Kantor Kayu Jati',
                'deskripsi' => 'Meja kerja dari kayu jati solid ukuran 120x60x75 cm',
                'kategori_id' => $furniture->id,
                'stok' => 10
            ],
            [
                'nama' => 'Kursi Kantor Ergonomis',
                'deskripsi' => 'Kursi kantor dengan sandaran punggung ergonomis dan roda',
                'kategori_id' => $furniture->id,
                'stok' => 15
            ],
            [
                'nama' => 'Lemari Arsip 4 Laci',
                'deskripsi' => 'Lemari arsip besi 4 laci dengan sistem kunci',
                'kategori_id' => $furniture->id,
                'stok' => 8
            ],

            // Alat Tulis
            [
                'nama' => 'Papan Tulis Whiteboard 90x120',
                'deskripsi' => 'Papan tulis putih dengan frame aluminium dan penghapus',
                'kategori_id' => $alatTulis->id,
                'stok' => 6
            ],
            [
                'nama' => 'Spidol Boardmarker Set',
                'deskripsi' => 'Set spidol boardmarker warna-warni isi 12 buah',
                'kategori_id' => $alatTulis->id,
                'stok' => 20
            ],
            [
                'nama' => 'Kertas A4 70gsm',
                'deskripsi' => 'Kertas HVS A4 70gsm putih isi 500 lembar per rim',
                'kategori_id' => $alatTulis->id,
                'stok' => 50
            ],

            // Olahraga
            [
                'nama' => 'Bola Sepak Official Size 5',
                'deskripsi' => 'Bola sepak official FIFA size 5 kulit synthetic',
                'kategori_id' => $olahraga->id,
                'stok' => 12
            ],
            [
                'nama' => 'Raket Badminton Yonex',
                'deskripsi' => 'Raket badminton Yonex Arcsaber 11 dengan senar',
                'kategori_id' => $olahraga->id,
                'stok' => 8
            ],
            [
                'nama' => 'Matras Yoga Premium',
                'deskripsi' => 'Matras yoga anti-slip thickness 6mm dengan tas',
                'kategori_id' => $olahraga->id,
                'stok' => 15
            ],

            // Kendaraan
            [
                'nama' => 'Sepeda Gunung MTB 26"',
                'deskripsi' => 'Sepeda gunung 21 speed dengan frame alloy dan suspensi depan',
                'kategori_id' => $kendaraan->id,
                'stok' => 4
            ],
            [
                'nama' => 'Helm Safety Proyek',
                'deskripsi' => 'Helm safety untuk proyek konstruksi warna kuning',
                'kategori_id' => $kendaraan->id,
                'stok' => 25
            ],

            // Alat Kebersihan
            [
                'nama' => 'Vacuum Cleaner Wet & Dry',
                'deskripsi' => 'Vacuum cleaner untuk basah dan kering kapasitas 15L',
                'kategori_id' => $kebersihan->id,
                'stok' => 3
            ],
            [
                'nama' => 'Sapu Lidi Tradisional',
                'deskripsi' => 'Sapu lidi asli untuk membersihkan halaman',
                'kategori_id' => $kebersihan->id,
                'stok' => 30
            ],
            [
                'nama' => 'Pel Microfiber + Ember',
                'deskripsi' => 'Set pel microfiber dengan ember dan sistem peras',
                'kategori_id' => $kebersihan->id,
                'stok' => 10
            ]
        ];

        foreach ($barangs as $barang) {
    $barang['foto'] = $barang['foto'] ?? 'uploads/default.jpg';
    Barang::create($barang);
}

    }
}