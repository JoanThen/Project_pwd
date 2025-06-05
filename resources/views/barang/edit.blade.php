<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">
    <!-- NAVBAR -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-boxes text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Edit Barang</h1>
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
    <main class="max-w-4xl mx-auto px-4 py-6">
        @if (session('success'))
            <div id="success-alert" class="mb-6 bg-green-600/90 text-white px-6 py-3 rounded-lg shadow-lg flex justify-between items-center animate-fade-in">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    {{ session('success') }}
                </div>
                <button onclick="document.getElementById('success-alert').remove()" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('barang.index') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Barang
            </a>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden shadow-xl border border-gray-700/50">
            <div class="p-5 border-b border-gray-700">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-edit mr-3 text-blue-400"></i> Edit Barang
                </h2>
            </div>

            <div class="p-6">
                <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-blue-300">Nama Barang</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $barang->nama) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-white"
                                   required>
                        </div>

                        <div>
                            <label for="kategori_id" class="block mb-2 text-sm font-medium text-blue-300">Kategori</label>
                            <select name="kategori_id" id="kategori_id" 
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-white" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="stok" class="block mb-2 text-sm font-medium text-blue-300">Stok</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok', $barang->stok) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-white"
                                   min="0" required>
                        </div>

                        <div>
                            <label for="foto" class="block mb-2 text-sm font-medium text-blue-300">Foto Barang</label>
                            <input type="file" name="foto" id="foto"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-colors">

                            @if ($barang->foto)
                                <div class="mt-3 flex items-center space-x-4">
                                    <p class="text-sm text-gray-400">Foto saat ini:</p>
                                    <img src="{{ asset('storage/barangs/' . $barang->foto) }}" alt="Foto Barang"
                                         class="w-16 h-16 object-cover border border-gray-600 rounded-lg">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-blue-300">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                                  class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-white">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-700">
                        <a href="{{ route('barang.index') }}" class="flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded-lg transition-colors">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                        <button type="submit" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Custom Animation -->
    <style type="text/tailwindcss">
        @layer utilities {
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animate-fade-in {
                animation: fade-in 0.4s ease-out;
            }
        }
    </style>

    <script>
        // Auto-hide success message after 5 seconds
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) alert.remove();
        }, 5000);
    </script>
</body>
</html>