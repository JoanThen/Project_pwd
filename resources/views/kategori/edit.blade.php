<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen font-sans bg-gradient-to-br from-blue-900 via-gray-900 to-black text-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-edit text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold">SARPRAS - Edit Kategori Barang</h1>
            </div>
            
            <div class="flex items-center space-x-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-gray-300 hover:text-white transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
                <div class="w-10 h-10 overflow-hidden rounded-full border-2 border-blue-400">
                    <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-gray-800/70 backdrop-blur-sm rounded-xl shadow-xl border border-gray-700/50 overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-700/50 bg-gradient-to-r from-blue-900/50 to-gray-900/50">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-tag mr-3 text-blue-400"></i> Edit Kategori
                </h2>
                <p class="text-sm text-gray-400 mt-1">Update informasi kategori barang</p>
            </div>
            
            <!-- Form -->
            <div class="p-6">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                                    <div>
                        <label for="nama_kategori" class="block text-sm font-medium mb-2 flex items-center">
                            <i class="fas fa-font mr-2 text-blue-400 text-sm"></i> Nama Kategori
                        </label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                            class="w-full px-4 py-3 rounded-lg bg-gray-700/80 border border-gray-600/50 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 focus:outline-none transition-all"
                            required autocomplete="off"
                            placeholder="Masukkan nama kategori">
                        @error('nama_kategori')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('kategori.index') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium flex items-center transition-all hover:scale-[1.02] active:scale-95">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        /* Smooth transitions for form elements */
        input {
            transition: all 0.3s ease;
        }
        
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }
    </style>
</body>
</html>