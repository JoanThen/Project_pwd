@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-black py-12 px-4">
    <div class="container mx-auto p-6 bg-white/10 backdrop-blur-md shadow-xl rounded-2xl w-full max-w-5xl">
        <h2 class="text-3xl font-bold mb-6 text-center text-white tracking-wide drop-shadow-md">
            📦 Laporan Stok Barang
        </h2>
        <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Jumlah Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @forelse ($barangs as $barang)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $barang->nama }}</td>
                        <td class="px-6 py-4">{{ $barang->kategori->nama ?? '-' }}</td>
                        <td class="px-6 py-4 font-semibold text-blue-800">{{ $barang->stok }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4 text-red-500">Tidak ada data barang.</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
