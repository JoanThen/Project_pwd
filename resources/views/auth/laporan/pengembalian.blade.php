<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengembalian - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans text-white bg-[#0a1931]">
    <main class="p-10">
        <h2 class="text-xl font-bold mb-6">Laporan Pengembalian</h2>
        <table class="w-full border border-gray-700">
            <thead class="bg-[#1e2a38]">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Nama Peminjam</th>
                    <th class="px-4 py-2">Tanggal Pengembalian</th>
                    <th class="px-4 py-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalians as $i => $pengembalian)
                <tr class="border-t border-gray-700 bg-[#22303f]">
                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                    <td class="px-4 py-2">{{ $pengembalian->peminjaman->barang->nama ?? 'Tidak diketahui' }}</td>
                    <td class="px-4 py-2">{{ $pengembalian->peminjaman->nama_peminjam ?? 'Tidak diketahui' }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $pengembalian->keterangan ?? '-' }}</td>
                </tr>
                @endforeach
                <a href="{{ route('pendataan') }}" class="text-blue-300 hover:text-blue-400 text-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
            </tbody>
        </table>
    </main>
</body>
</html>