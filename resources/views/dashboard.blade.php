    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - SARPAS</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </head>

    <body class="min-h-screen font-sans bg-gradient-to-bl from-[#121212] via-[#1a1a2e] to-[#16213e] text-white relative overflow-hidden">

        <!-- Container -->
        <div class="flex min-h-screen">
            <!-- SIDEBAR (Keep your original sidebar) -->
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
                        <!-- User Info (Optional) -->
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <div class="bg-[#1a1a2e]/70 rounded-lg p-3 flex items-center justify-between border border-[#2a2a40]/50 gap-3">
                    <!-- Profile Section -->
                    <div class="flex items-center gap-3">
                        <!-- Profile Image -->
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 p-0.5">
                            <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-full h-full rounded-full object-cover">
                        </div>
                        
                            <!-- User Name & Email (Now beside the image) -->
                            <div class="flex flex-col">
                                <p class="text-sm font-medium text-gray-200">Joan Imanuel Then</p>
                                <p class="text-xs text-gray-400">joanthen812@gmail.com</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="bg-[#0c0c16]/80 backdrop-blur-md shadow-lg px-6 py-4 flex justify-between items-center sticky top-0 z-10 border-b border-[#2a2a40]">
                    <div class="flex items-center space-x-4">
                        <div class="text-blue-400 text-2xl">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h2 class="text-2xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">Dashboard</h2>
                    </div>

                    <div class="flex items-center space-x-6">
                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" class="bg-[#1f1f3f]/40 border border-[#2a2a40] text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search...">
                        </div>
                    <div class="flex items-center gap-3">
                            <div class="flex flex-col items-end">
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <span class="text-xs text-gray-400">Admin</span>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 p-0.5">
                                <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-full h-full rounded-full object-cover">
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Content -->
                <main class="flex-1 p-6 overflow-auto">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-200">Welcome back, Admin!</h3>
                        <p class="text-gray-400">Here's what's happening with your system today.</p>
                    </div>

                                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                                <!-- Card Total Pengguna -->
                                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-blue-500/20 text-blue-400 mr-4">
                                            <i class="fas fa-users text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-400">Total Pengguna</p>
                                            <h3 class="text-2xl font-bold text-gray-200">{{ $totalUsers }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Total Barang -->
                                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-green-500/20 text-green-400 mr-4">
                                            <i class="fas fa-boxes text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-400">Total Barang</p>
                                            <h3 class="text-2xl font-bold text-gray-200">{{ $totalBarang }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Peminjaman Aktif -->
                                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-orange-500/20 text-orange-400 mr-4">
                                            <i class="fas fa-hand-holding text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-400">Peminjaman Aktif</p>
                                            <h3 class="text-2xl font-bold text-gray-200">{{ $peminjamanAktif }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Pengembalian Hari Ini -->
                                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-purple-500/20 text-purple-400 mr-4">
                                            <i class="fas fa-exchange-alt text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-400">Pengembalian Hari Ini</p>
                                            {{-- <h3 class="text-2xl font-bold text-gray-200">{{ $pengembalianHariIni }}</h3> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden mb-8">
                    <div class="bg-gradient-to-r from-blue-600/10 to-indigo-600/5 p-6 border-b border-[#2a2a40]/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                <i class="fas fa-bolt text-blue-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-200">Quick Actions</h3>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6">
                        <a href="{{ route('pengguna') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-[#1a1a2e]/50 transition-all duration-200 group">
                            <div class="p-3 rounded-full bg-blue-500/20 text-blue-400 mb-2 group-hover:bg-blue-500/30 transition-colors">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <span class="text-sm font-medium text-center text-gray-200">Tambah Pengguna</span>
                        </a>
                        <a href="{{ route('barang.create') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-[#1a1a2e]/50 transition-all duration-200 group">
                            <div class="p-3 rounded-full bg-green-500/20 text-green-400 mb-2 group-hover:bg-green-500/30 transition-colors">
                                <i class="fas fa-box-open text-xl"></i>
                            </div>
                            <span class="text-sm font-medium text-center text-gray-200">Tambah Barang</span>
                        </a>
                        <a href="{{ route('peminjaman.index') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-[#1a1a2e]/50 transition-all duration-200 group">
                            <div class="p-3 rounded-full bg-orange-500/20 text-orange-400 mb-2 group-hover:bg-orange-500/30 transition-colors">
                                <i class="fas fa-hand-holding text-xl"></i>
                            </div>
                            <span class="text-sm font-medium text-center text-gray-200">Peminjaman</span>
                        {{-- </a>
                        <a href="{{ route('laporan.export') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-[#1a1a2e]/50 transition-all duration-200 group">
                            <div class="p-3 rounded-full bg-purple-500/20 text-purple-400 mb-2 group-hover:bg-purple-500/30 transition-colors">
                                <i class="fas fa-file-export text-xl"></i>
                            </div>
                            <span class="text-sm font-medium text-center text-gray-200">Ekspor Laporan</span>
                        </a> --}}
                    </div>
                </div>

        <!-- FOOTER -->
        <footer class="bg-[#0c0c16]/80 backdrop-blur-md py-4 px-8 border-t border-[#2a2a40]">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <p class="text-sm text-gray-400">© 2025 <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">SARPAS</span>. All Rights Reserved.</p>
                </div>
                <div>
                    <ul class="flex space-x-4 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <!-- JS for animations -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add subtle animations to cards
                const cards = document.querySelectorAll('.grid > div');
                cards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                    card.classList.add('animate-fade-in');
                });
            });
        </script>

        <!-- Custom Animations -->
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fade-in {
                animation: fade-in 0.6s ease-out forwards;
            }
            
            /* Scrollbar styling */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: #1a1a2e;
            }
            
            ::-webkit-scrollbar-thumb {
                background: #2a2a40;
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: #3a3a50;
            }
        </style>
    </body>
    </html>