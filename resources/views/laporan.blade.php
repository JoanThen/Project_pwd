<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen font-sans bg-gradient-to-bl from-[#121212] via-[#1a1a2e] to-[#16213e] text-white relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0 opacity-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#fff" stroke-width="0.5" opacity="0.3" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600 rounded-full filter blur-3xl opacity-10 -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-600 rounded-full filter blur-3xl opacity-10 translate-y-1/3 -translate-x-1/4"></div>
    <div class="absolute top-1/4 left-1/3 w-64 h-64 bg-purple-600 rounded-full filter blur-3xl opacity-5 animate-pulse"></div>

    <!-- NAVBAR -->
    <nav class="bg-[#0c0c16]/80 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center border-b border-[#2a2a40]">
        <div class="flex items-center gap-3">
            <div class="text-blue-400 text-2xl">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h1 class="text-3xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">
                Laporan
            </h1>
        </div>

        <!-- Profile + Logout -->
        <div class="flex items-center gap-6">
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
        <aside class="w-72 bg-[#0c0c16]/90 py-10 px-6 border-r border-[#2a2a40] min-h-screen relative z-10">
            <div class="mb-10 px-4">
                <div class="text-center">
                    <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">SARPAS</h2>
                    <p class="text-xs text-gray-400 mt-1">Sistem Administrasi Resource Planning</p>
                </div>
            </div>

            <ul class="space-y-2">
                <li class="mb-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                        <i class="fas fa-tachometer-alt text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li><a href="{{ route('pengguna') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                    <i class="fas fa-users text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                    <span>Pengguna</span>
                </a></li>
                <li><a href="{{ route('pendataan') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                    <i class="fas fa-clipboard-list text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                    <span>Pendataan</span>
                </a></li>
                <li><a href="{{ route('laporan') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-[#1a1a2e] bg-opacity-80 border-l-4 border-blue-500 group">
                    <i class="fas fa-chart-bar text-blue-400 w-5 text-center"></i>
                    <span>Laporan</span>
                </a></li>
            </ul>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-8 z-10">
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-2">Data Laporan</h2>
                <div class="flex items-center text-sm text-gray-400">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-400">Dashboard</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span>Laporan</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Laporan Stok Barang -->
                <a href="#" class="group">
                    <div class="h-full bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden transition-all duration-300 hover:shadow-blue-900/20 hover:border-blue-800/30 group-hover:translate-y-[-4px]">
                        <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/10 p-5 flex justify-between items-center">
                            <h2 class="text-xl font-bold">Laporan Stok Barang</h2>
                            <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400">
                                <i class="fas fa-boxes"></i>
                            </div>
                        </div>
                       
                        <div class="-5">
                            <p class="text-gray-400 mb-5">Lihat laporan stok barang yang tersedia dalam sistem.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-blue-400 group-hover:text-blue-300 flex items-center gap-1 text-sm">
                                    Detail <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Laporan Peminjaman -->
                <a href="#" class="group">
                    <div class="h-full bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden transition-all duration-300 hover:shadow-teal-900/20 hover:border-teal-800/30 group-hover:translate-y-[-4px]">
                        <div class="bg-gradient-to-r from-teal-600/20 to-blue-600/10 p-5 flex justify-between items-center">
                            <h2 class="text-xl font-bold">Laporan Peminjaman</h2>
                            <div class="w-10 h-10 rounded-lg bg-teal-500/20 flex items-center justify-center text-teal-400">
                                <i class="fas fa-handshake"></i>
                            </div>
                        </div                        <div class="p-5">
                            <p class="text-gray-400 mb-5">Lihat laporan peminjaman barang yang telah dilakukan.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-teal-400 group-hover:text-teal-300 flex items-center gap-1 text-sm">
                                    Detail <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Laporan Pengembalian -->
                <a href="#" class="group">
                    <div class="h-full bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden transition-all duration-300 hover:shadow-indigo-900/20 hover:border-indigo-800/30 group-hover:translate-y-[-4px]">
                        <div class="bg-gradient-to-r from-indigo-600/20 to-blue-600/10 p-5 flex justify-between items-center">
                            <h2 class="text-xl font-bold">Laporan Pengembalian</h2>
                            <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                        </div>
                        <div class="p-5">
                            <p class="text-gray-400 mb-5">Lihat laporan pengembalian barang yang telah dilakukan.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-indigo-400 group-hover:text-indigo-300 flex items-center gap-1 text-sm">
                                    Detail <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

           