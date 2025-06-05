<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">

    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-boxes text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Data Barang</h1>
            </div>
            <div class="flex items-center gap-5">
                <a href="{{ route('barang.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Barang
                </a>
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
            <i class="fas fa-boxes mr-3 text-blue-400"></i>Daftar Barang
        </h2>

        <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs uppercase bg-gray-700 text-blue-200">
                    <tr>
                        <th class="px-6 py-3"><i class=""></i>ID</th>
                        <th class="px-6 py-3"><i class="fas fa-image mr-1"></i>Foto</th>
                        <th class="px-6 py-3"><i class="fas fa-box mr-1"></i>Nama</th>
                        <th class="px-6 py-3"><i class="fas fa-tags mr-1"></i>Kategori</th>
                        <th class="px-6 py-3"><i class="fas fa-layer-group mr-1"></i>Stok</th>
                        <th class="px-6 py-3"><i class="fas fa-cog mr-1"></i>Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($barangs as $barang)
                    <tr class="hover:bg-gray-700/50 text-center">
                        <td class="px-6 py-4">{{ $barang->id }}</td>
                        <td class="px-6 py-4">
                            @if($barang->foto)
                                <div class="flex justify-center">
                                    <img src="{{ asset('storage/barangs/' . $barang->foto) }}" 
                                         alt="{{ $barang->nama }}" 
                                         class="w-12 h-12 object-cover rounded-lg border-2 border-blue-400/30 shadow-sm">
                                </div>
                            @else
                                <div class="flex justify-center">
                                    <div class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center border-2 border-gray-600">
                                        <i class="fas fa-image text-gray-500"></i>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-white">{{ $barang->nama }}</td>
                        <td class="px-6 py-4">
                            @if($barang->kategori)
                                <span class="bg-purple-500/20 text-purple-300 text-xs px-3 py-1 rounded-full">
                                    {{ $barang->kategori->nama_kategori }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
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
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('barang.edit', $barang->id) }}" 
                                   class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded-lg transition flex items-center">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin hapus barang ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg transition flex items-center">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center px-6 py-4 text-gray-400">
                            <i class="fas fa-inbox mr-2"></i>Belum ada data barang
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>