<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Stok - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">

    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-warehouse text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Laporan Stok</h1>
            </div>
            <div class="flex items-center gap-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-gray-300 hover:text-white transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-400">
                    <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="object-cover w-full h-full">
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Message -->
    @if (session('success'))
    <div class="max-w-xl mx-auto mt-6">
        <div id="success-alert"
             class="bg-green-600 text-white px-4 py-3 rounded-md shadow-md flex items-center justify-between">
            <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
        </div>
    </div>
    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) alert.remove();
        }, 3000);
    </script>
    @endif

    <main class="max-w-7xl mx-auto px-6 py-10">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-blue-400 hover:underline flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

        <h2 class="text-2xl font-bold mb-6 flex items-center">
            <i class="fas fa-warehouse mr-3 text-blue-400"></i>Laporan Stok Barang
        </h2>

        <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-300" id="stokBarangTable">
                <thead class="text-xs uppercase bg-gray-700 text-blue-200">
                    <tr>
                        <th class="px-6 py-3"><i class=""></i>No</th>
                        <th class="px-6 py-3"><i class="fas fa-box mr-1"></i>Nama Barang</th>
                        <th class="px-6 py-3"><i class="fas fa-tags mr-1"></i>Kategori</th>
                        <th class="px-6 py-3"><i class="fas fa-layer-group mr-1"></i>Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($barangs as $i => $barang)
                    <tr class="hover:bg-gray-700/50 text-center">
                        <td class="px-6 py-4">{{ $i + 1 }}</td>
                        <td class="px-6 py-4">{{ $barang->nama }}</td>
                        <td class="px-6 py-4">{{ $barang->kategori->nama_kategori ?? 'Tidak ada' }}</td>
                        <td class="px-6 py-4">
                            @if($barang->stok <= 5)
                                <span class="bg-red-500/20 text-red-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>{{ $barang->stok }}
                                </span>
                            @elseif($barang->stok <= 10)
                                <span class="bg-yellow-500/20 text-yellow-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $barang->stok }}
                                </span>
                            @else
                                <span class="bg-green-500/20 text-green-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-check-circle mr-1"></i>{{ $barang->stok }}
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4 text-gray-400">
                            <i class="fas fa-inbox mr-2"></i>Belum ada data barang
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                                    <button
                    id="downloadExcel"
                    class="mb-4 bg-[#9c4dff] hover:bg-[#7b1fa2] text-white font-bold px-4 py-2 rounded">
                    Convert to Excel
                    </button>
            </table>
        </div>
    </main>
        <script>
            document.getElementById("downloadExcel").addEventListener("click", () => {
    const table = document.getElementById("stokBarangTable");
    const wb = XLSX.utils.table_to_book(table, { sheet: "Stok Barang" });
    XLSX.writeFile(wb, "Laporan_Stok_Barang.xlsx");
  });
        </script>
</body>
</html>