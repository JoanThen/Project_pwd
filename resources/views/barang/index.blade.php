<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2d9d5c36f.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0a1931] to-[#000000] text-white font-sans">

    <!-- HEADER -->
    <nav class="bg-[#1b263b] px-8 py-4 shadow flex justify-between items-center">
        <h1 class="text-2xl font-bold">Manajemen Barang</h1>
        <a href="{{ route('barang.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            <i class="fas fa-plus mr-1"></i> Tambah Barang
        </a>
    </nav>
        

    <main class="max-w-7xl mx-auto p-6">
        @if (session('success'))
            <div class="mb-4 bg-green-600 text-white px-6 py-3 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#1e2a38] p-6 rounded-lg shadow border border-[#324a5e]">
            <h2 class="text-xl font-semibold mb-4">Daftar Barang</h2>
            <div class="overflow-x-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
                <table class="w-full border border-[#324a5e] text-left">
                    <thead class="bg-[#243447] text-sm">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Kategori</th>
                            <th class="px-4 py-2 border">Stok</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                        <tr class="border-t border-[#324a5e] bg-[#22303f] hover:bg-[#2a3d55] transition">
                            <td class="px-4 py-2">{{ $barang->id }}</td>
                            <td class="px-4 py-2">{{ $barang->nama }}</td>
                            <td class="px-4 py-2">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $barang->stok }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Yakin hapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-white/70">Tidak ada data barang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
