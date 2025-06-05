<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengembalian - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">

    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fas fa-undo text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Laporan Pengembalian</h1>
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
            <i class="fas fa-undo mr-3 text-blue-400"></i>Laporan Pengembalian Barang
        </h2>

        <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs uppercase bg-gray-700 text-blue-200">
                    <tr>
                        <th class="px-6 py-3"><i class=""></i>No</th>
                        <th class="px-6 py-3"><i class="fas fa-box mr-1"></i>Nama Barang</th>
                        <th class="px-6 py-3"><i class="fas fa-user mr-1"></i>Nama Peminjam</th>
                        <th class="px-6 py-3"><i class="fas fa-calendar-check mr-1"></i>Tanggal Pengembalian</th>
                        <th class="px-6 py-3"><i class="fas fa-info-circle mr-1"></i>Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($pengembalians as $i => $pengembalian)
                    <tr class="hover:bg-gray-700/50 text-center">
                        <td class="px-6 py-4">{{ $i + 1 }}</td>
                        <td class="px-6 py-4">{{ $pengembalian->peminjaman->barang->nama ?? 'Tidak diketahui' }}</td>
                        <td class="px-6 py-4">{{ $pengembalian->peminjaman->nama_peminjam ?? 'Tidak diketahui' }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-500/20 text-green-300 text-xs px-3 py-1 rounded-full">
                                <i class="fas fa-calendar-check mr-1"></i>
                                {{ \Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->format('d M Y') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($pengembalian->keterangan && $pengembalian->keterangan !== '-')
                                <span class="bg-blue-500/20 text-blue-300 text-xs px-3 py-1 rounded-full">
                                    {{ $pengembalian->keterangan }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-400">
                            <i class="fas fa-inbox mr-2"></i>Belum ada data pengembalian
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Recent Returns Timeline -->
        @if($pengembalians->count() > 0)
        <div class="bg-gray-800 rounded-lg p-6 shadow-md mt-8">
            <h3 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-history mr-2 text-blue-400"></i>
                Riwayat Pengembalian Terbaru
            </h3>
            <div class="space-y-4">
                @foreach($pengembalians->take(5) as $recent)
                <div class="flex items-center p-3 bg-gray-700/50 rounded-lg">
                    <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-undo text-green-400"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-medium">{{ $recent->peminjaman->barang->nama ?? 'Tidak diketahui' }}</p>
                        <p class="text-gray-400 text-sm">Dikembalikan oleh {{ $recent->peminjaman->nama_peminjam ?? 'Tidak diketahui' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-400 text-sm">{{ \Carbon\Carbon::parse($recent->tanggal_pengembalian)->format('d M Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </main>
</body>
</html>