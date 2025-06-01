<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans text-white bg-[#0a1931]">
    <main class="p-10">
        <h2 class="text-xl font-bold mb-6">Laporan Peminjaman</h2>
        <table class="w-full border border-gray-700">
            <thead class="bg-[#1e2a38]">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Peminjam</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Tanggal Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $i => $p)
                <tr class="border-t border-gray-700 bg-[#22303f]">
                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                    <td class="px-4 py-2">{{ $p->nama_peminjam }}</td>
                    <td class="px-4 py-2">{{ $p->barang->nama ?? 'Tidak diketahui' }}</td>
                    <td class="px-4 py-2">{{ $p->jumlah }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                </tr>
                @endforeach
                <a href="{{ route('pendataan') }}" class="text-blue-300 hover:text-blue-400 text-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
            </tbody>
        </table>
    </main>
</body>
</html>