<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans text-white bg-[#0a1931]">
    <nav class="bg-[#1b263b] px-10 py-4 shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-semibold">Laporan</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white hover:text-blue-300 transition">Log out</button>
        </form>
    </nav>
    
    <main class="p-10">
        <h2 class="text-xl font-bold mb-6">Pilih Jenis Laporan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('laporan.stok') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded shadow text-center transition">Laporan Stok Barang</a>
            <a href="{{ route('laporan.peminjaman') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded shadow text-center transition">Laporan Peminjaman</a>
            <a href="{{ route('laporan.pengembalian') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-4 rounded shadow text-center transition">Laporan Pengembalian</a>
        </div>
    </main>
</body>
</html>