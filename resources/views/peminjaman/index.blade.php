<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">

    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-clipboard-list text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Daftar Peminjaman</h1>
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
            <i class="fas fa-list mr-3 text-blue-400"></i>Daftar Peminjaman Barang
        </h2>

        <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs uppercase bg-gray-700 text-blue-200">
                    <tr>
                        <th class="px-6 py-3"><i class="fas fa-user mr-1"></i>Nama</th>
                        <th class="px-6 py-3"><i class="fas fa-box mr-1"></i>Barang</th>
                        <th class="px-6 py-3"><i class="fas fa-layer-group mr-1"></i>Kategori</th>
                        <th class="px-6 py-3"><i class="fas fa-layer-group mr-1"></i>Jumlah</th>
                        <th class="px-6 py-3"><i class="fas fa-info-circle mr-1"></i>Status</th>
                        <th class="px-6 py-3"><i class="fas fa-calendar-alt mr-1"></i>Tanggal Pinjam</th>
                        <th class="px-6 py-3"><i class="fas fa-calendar-check mr-1"></i>Tanggal Kembali</th>
                        <th class="px-6 py-3"><i class="fas fa-cog mr-1"></i>Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($peminjamans as $peminjaman)
                    <tr class="hover:bg-gray-700/50 text-center">
                        <td class="px-6 py-4">{{ $peminjaman->user->name }}</td>
                        <td class="px-6 py-4">{{ $peminjaman->barang->nama_barang }}</td>
                        <td class="px-6 py-4">{{ $peminjaman->barang->kategori->nama_kategori ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $peminjaman->jumlah }}</td>
                        <td class="px-6 py-4">
                            @switch($peminjaman->status)
                                @case('pending')
                                <span class="bg-yellow-500/20 text-yellow-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-clock mr-1"></i>Pending
                                </span>
                                @break
                                @case('approved')
                                <span class="bg-green-500/20 text-green-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-check mr-1"></i>Disetujui
                                </span>
                                @break
                                @case('selesai')
                                <span class="bg-blue-500/20 text-blue-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-check-double mr-1"></i>Selesai
                                </span>
                                @break
                                @default
                                <span class="bg-red-500/20 text-red-300 text-xs px-3 py-1 rounded-full">
                                    <i class="fas fa-times mr-1"></i>Ditolak
                                </span>
                            @endswitch
                        </td>
                        <td class="px-6 py-4">{{ $peminjaman->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') : '-' }}</td>
                        <td class="px-6 py-4">
                            @if ($peminjaman->status == 'pending')
                            <div class="flex justify-center gap-2">
                                <form action="{{ route('peminjaman.approve', $peminjaman->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">
                                        <i class="fas fa-check mr-1"></i>Setuju
                                    </button>
                                </form>
                                <form action="{{ route('peminjaman.reject', $peminjaman->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                        <i class="fas fa-times mr-1"></i>Tolak
                                    </button>
                                </form>
                            </div>
                            @else
                            <span class="text-gray-400 text-sm">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center px-6 py-4 text-gray-400">
                            <i class="fas fa-inbox mr-2"></i>Belum ada data peminjaman
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
