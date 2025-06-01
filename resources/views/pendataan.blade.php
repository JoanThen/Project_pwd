<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen font-sans bg-gradient-to-bl from-[#121212] via-[#1a1a2e] to-[#16213e] text-white relative overflow-hidden">

    <!-- NAVBAR -->
    <nav class="bg-[#0c0c16]/80 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center border-b border-[#2a2a40]">
        <div class="flex items-center gap-3">
            <div class="text-blue-400 text-2xl">
                <i class="fas fa-database"></i>
            </div>
            <h1 class="text-3xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">
                Pendataan
            </h1>
        </div>

        <!-- Profile + Logout -->
        <div class="flex items-center gap-6">
            <div class="relative">
                <button class="text-gray-300 hover:text-white transition">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </button>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-gray-300 hover:text-white transition duration-200">
                    <span>Log out</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
            <div class="flex items-center gap-3">
                <div class="flex flex-col items-end">
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-gray-400">User</span>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 p-0.5">
                    <img src="assets/OIP.jpeg" alt="Profile" class="w-full h-full rounded-full object-cover">
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="flex">
        <!-- SIDEBAR -->
       <aside class="w-80 bg-gradient-to-b from-[#0c0c16] to-[#13131f] py-10 px-6 border-r border-[#2a2a40]/70 min-h-screen relative z-10 shadow-xl">
    <!-- Logo and System Title -->
    <div class="mb-12 px-4">
        <div class="text-center py-3 border-b border-[#2a2a40]/50 pb-6">
            <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">SARPAS</h2>
            <p class="text-xs text-gray-400 mt-2">Sistem Administrasi Resource Planning</p>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="space-y-6">
        <!-- Main Menu Section -->
        <div>
            <h3 class="text-xs uppercase text-gray-500 font-semibold px-4 mb-3">Menu Utama</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-[#1a1a2e] bg-opacity-80 border-l-4 border-blue-500 shadow-md group">
                        <i class="fas fa-tachometer-alt text-blue-400 w-5 text-center"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengguna') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                        <i class="fas fa-users text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                        <i class="fas fa-tags text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Kategori Barang</span>
                    </a>
                </li>
                 <li>
                            <a href="{{ route('barang.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                                <i class="fas fa-box text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                                <span>Barang</span>
                            </a>
                    </li>
            </ul>
        </div>

        <!-- Transaction Section -->
        <div>
            <h3 class="text-xs uppercase text-gray-500 font-semibold px-4 mb-3 mt-6">Transaksi</h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('peminjaman.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                        <i class="fas fa-handshake text-gray-400 group-hover:text-teal-400 transition-colors w-5 text-center"></i>
                        <span>Peminjaman Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengembalian.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                        <i class="fas fa-undo-alt text-gray-400 group-hover:text-indigo-400 transition-colors w-5 text-center"></i>
                        <span>Pengembalian Barang</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Reports Section -->
     <div>
                <h3 class="text-xs uppercase text-gray-500 font-semibold px-4 mb-3 mt-6">Laporan</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('laporan.stok') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                            <i class="fas fa-boxes text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                            <span>Laporan Stok Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.peminjaman') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                            <i class="fas fa-handshake text-gray-400 group-hover:text-teal-400 transition-colors w-5 text-center"></i>
                            <span>Laporan Peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.pengembalian') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                            <i class="fas fa-undo-alt text-gray-400 group-hover:text-indigo-400 transition-colors w-5 text-center"></i>
                            <span>Laporan Pengembalian</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>

        

        <!-- CONTENT - NOW EMPTY OR WITH MINIMAL CONTENT -->
        <main class="flex-1 p-8 z-10">
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-2">Selamat Datang di Pendataan</h2>
                <div class="flex items-center text-sm text-gray-400">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-400">Dashboard</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span>Pendataan</span>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6">
                <p class="text-gray-300">Silahkan pilih menu di sidebar untuk mengelola data</p>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-[#0c0c16]/80 text-center py-4 border-t border-[#2a2a40] mt-auto">
        <p class="text-gray-400 text-sm">&copy; 2025 SARPAS. All rights reserved.</p>
    </footer>

    <!-- Custom Animations -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes drift {
            0% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(10px, -5px) rotate(5deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-drift {
            animation: drift 8s ease-in-out infinite;
        }
    </style>
</body>
</html>