<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pendataan - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">
    <!-- NAVBAR -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-boxes text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold text-white">SARPRAS - Pendataan Barang</h1>
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
    <main class="max-w-7xl mx-auto px-4 py-6">
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
            <a href="{{ route('dashboard') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <a href="{{ route('kategori.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Kategori
            </a>
        </div>

        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden shadow-xl border border-gray-700/50">
            <div class="p-5 border-b border-gray-700">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-tags mr-3 text-blue-400"></i> Daftar Kategori
                </h2>
            </div>
            
            <!-- Tabel Kategori -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700/60">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Nama Kategori</th>
                            <th class="px-6 py-3 text-right text-sm font-medium text-blue-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        @foreach ($kategoris as $k)
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap font-mono text-gray-400">{{ $k->id }}</td>
                            <td class="px-6 py-4">
                                <a href="" class="text-blue-400 hover:text-blue-300 hover:underline transition-colors flex items-center">
                                  <i class="fas fa-folder-open mr-2 text-sm"></i> {{ $k->nama }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                <a href="{{ route('barang.index', ['kategori_id' => $k->id]) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-box-open mr-1 text-xs"></i>
                                    <span>Barang</span>
                                </a>
                                <a href="{{ route('kategori.edit', $k->id) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-edit mr-1 text-xs"></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 rounded-lg text-sm transition-colors">
                                        <i class="fas fa-trash-alt mr-1 text-xs"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
