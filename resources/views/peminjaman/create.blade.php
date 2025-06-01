<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2d9d5c36f.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen font-sans text-white bg-[#0a1931]">
    <!-- NAVBAR -->
    <nav class="bg-[#1b263b] px-6 py-3 shadow-md flex justify-between items-center border-b border-[#324a5e]">
        <h1 class="text-xl font-medium">Tambah Peminjaman</h1>
        <div class="flex items-center gap-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:text-blue-300 transition">Log out</button>
            </form>
            <div class="w-8 h-8">
                <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="max-w-md mx-auto p-5 mt-6">
        <div class="bg-[#1e2a38] p-5 rounded-lg shadow border border-[#324a5e]">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-medium">Form Tambah Peminjaman</h2>
                <a href="{{ route('peminjaman.index') }}" class="text-blue-300 hover:text-blue-400 text-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-3">
                @csrf

                <div>
                    <label class="block text-sm mb-1">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="w-full p-2 bg-[#243447] border border-[#324a5e] rounded" required>
                </div>

                <div>
                    <label class="block text-sm mb-1">Barang</label>
                    <select name="barang_id" class="w-full p-2 bg-[#243447] border border-[#324a5e] rounded" required>
                        <option value="">-- Pilih Barang --</option>
                        <option value="1">Laptop Asus ROG</option>
                        <option value="3">Laptop MacBook Pro</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm mb-1">Jumlah</label>
                    <input type="number" name="jumlah" class="w-full p-2 bg-[#243447] border border-[#324a5e] rounded" required>
                </div>

                <div>
                    <label class="block text-sm mb-1">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="w-full p-2 bg-[#243447] border border-[#324a5e] rounded" required>
                </div>

                <div class="pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded w-full transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>