<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">
    <!-- NAVBAR -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-boxes text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Tambah Kategori</h1>
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

    <!-- MAIN CONTENT -->
    <main class="max-w-2xl mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('kategori.index') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden shadow-xl border border-gray-700/50">
            <div class="p-5 border-b border-gray-700">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-plus-circle mr-3 text-blue-400"></i> Tambah Kategori Barang
                </h2>
            </div>
            
            <!-- Form -->
            <div class="p-6">
                <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="nama_kategori" class="block text-sm font-medium text-blue-300 mb-2">
                            <i class="fas fa-tag mr-2"></i> Nama Kategori
                        </label>
                        <input type="text" 
                               name="nama_kategori" 
                               id="nama_kategori"
                               class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                               placeholder="Masukkan nama kategori..."
                               required 
                               autocomplete="off" 
                               autocapitalize="off" 
                               autocorrect="off" 
                               spellcheck="false">
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-all transform hover:scale-[1.02] flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i> Simpan Kategori
                        </button>
                        
                        <a href="{{ route('kategori.index') }}" 
                           class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>