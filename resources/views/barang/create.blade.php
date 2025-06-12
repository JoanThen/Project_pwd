<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tambah Item - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">
    <!-- NAVBAR -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-boxes text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Tambah Item</h1>
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
    <main class="max-w-3xl mx-auto px-4 py-6">
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('barang.index') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden shadow-xl border border-gray-700/50">
            <div class="p-5 border-b border-gray-700">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-plus-circle mr-3 text-blue-400"></i> Tambah Item Baru
                </h2>
            </div>
            
            <!-- Form -->
            <div class="p-6">
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama Item -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-blue-300 mb-2">
                            <i class="fas fa-tag mr-2"></i> Nama Item
                        </label>
                        <input type="text" 
                               name="nama" 
                               id="nama" 
                               placeholder="Masukkan nama item" 
                               value="{{ old('nama') }}"
                               class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('nama') border-red-500 @enderror"
                               required>
                        @error('nama')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Foto Item -->
                    <div>
                        <label for="foto" class="block text-sm font-medium text-blue-300 mb-2">
                            <i class="fas fa-camera mr-2"></i> Foto Item
                        </label>
                        <input type="file" 
                               name="foto" 
                               id="foto" 
                               accept="image/*"
                               class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-all @error('foto') border-red-500 @enderror">
                        <p class="text-gray-400 text-sm mt-1">
                            <i class="fas fa-info-circle mr-1"></i> Format: JPG, JPEG, PNG, GIF. Maksimal 2MB
                        </p>
                        @error('foto')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                        
                        <!-- Preview foto -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <div class="inline-block p-2 bg-gray-700/30 rounded-lg border border-gray-600">
                                <img id="preview" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-blue-300 mb-2">
                            <i class="fas fa-align-left mr-2"></i> Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4" 
                                  placeholder="Masukkan deskripsi item"
                                  class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-none @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Grid untuk Stok dan Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Stok -->
                        <div>
                            <label for="stok" class="block text-sm font-medium text-blue-300 mb-2">
                                <i class="fas fa-boxes mr-2"></i> Stok
                            </label>
                            <input type="number" 
                                   name="stok" 
                                   id="stok" 
                                   min="0" 
                                   placeholder="0"
                                   value="{{ old('stok') }}"
                                   class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('stok') border-red-500 @enderror"
                                   required>
                            @error('stok')
                                <p class="text-red-400 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="kategori_id" class="block text-sm font-medium text-blue-300 mb-2">
                                <i class="fas fa-list mr-2"></i> Kategori
                            </label>
                            <select name="kategori_id" 
                                    id="kategori_id" 
                                    required
                                    class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('kategori_id') border-red-500 @enderror">
                                <option value="" disabled selected class="text-gray-400">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}

                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-red-400 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex gap-3 pt-4">
                        <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-all transform hover:scale-[1.02] flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i> Simpan Item
                        </button>
                        
                        <a href="{{ route('barang.index') }}" 
                           class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Preview foto sebelum upload
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').classList.add('hidden');
            }
        });
    </script>
</body>

</html>