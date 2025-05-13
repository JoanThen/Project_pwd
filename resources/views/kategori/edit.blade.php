<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen font-sans text-white relative overflow-hidden"
      style="background: radial-gradient(circle at center, #0d47a1 0%, #0a1931 60%, #000000 100%);">

    <!-- Efek Radial Blur Tengah -->
    <div class="absolute inset-0 z-0">
        <div class="w-[600px] h-[600px] rounded-full blur-3xl opacity-25 bg-blue-800 mx-auto mt-32"></div>
    </div>

    <!-- NAVBAR -->
    <nav class="bg-[#1e1e1e]/90 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center">
        <h1 class="text-3xl font-semibold">Edit Kategori Barang</h1>
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:text-[#6aa6ff] transition duration-200">Log out</button>
            </form>
            <div class="w-10 h-10 flex items-center">
                <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="flex">
        <main class="flex-1 p-10 z-10">
            <div class="max-w-md mx-auto bg-[#1f1f1f]/80 p-6 rounded-2xl shadow-lg border border-[#333] mt-10 text-white">
                <h2 class="text-xl font-bold mb-4">Edit Kategori Barang</h2>

                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-medium mb-1">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                            class="w-full px-4 py-2 rounded bg-[#2a2a2a] text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false">
                    </div>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded transition-transform hover:scale-105">
                        Update
                    </button>
                </form>

                <div class="mt-4">
                    <a href="{{ route('kategori.index') }}" class="text-blue-400 hover:underline">← Kembali ke daftar</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
