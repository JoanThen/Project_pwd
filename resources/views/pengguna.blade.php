<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen font-sans bg-gradient-to-bl from-[#121212] via-[#1a1a2e] to-[#16213e] text-white relative overflow-hidden">

    <!-- NAVBAR -->
    <nav class="bg-[#0c0c16]/80 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center border-b border-[#2a2a40]">
        <div class="flex items-center gap-3">
            <div class="text-blue-400 text-2xl">
                <i class="fas fa-users"></i>
            </div>
            <h1 class="text-3xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">
                Pengguna
            </h1>
        </div>

        <!-- Search -->
        <div class="hidden md:flex items-center">
            <div class="relative w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-[#4a5568]"></i>
                </div>
                <input type="text" class="bg-[#1f1f3f]/40 border border-[#2a2a40] text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search...">
            </div>
        </div>

        <!-- Profile + Logout -->
        <div class="flex items-center gap-6">
            <div class="relative">
                
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
                    <span class="text-xs text-gray-400">Admin</span>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 p-0.5">
                    <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-full h-full rounded-full object-cover">
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
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition duration-300 group hover:shadow-md">
                        <i class="fas fa-tachometer-alt text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengguna') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-[#1a1a2e] bg-opacity-80 border-l-4 border-blue-500 shadow-md group">
                        <i class="fas fa-users text-blue-400 w-5 text-center"></i>
                        <span class="font-medium">Pengguna</span>
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
</aside>

        <!-- CONTENT -->
        <main class="flex-1 p-8 z-10 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-2">User Management</h2>
            
            </div>

            <!-- Stats cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5 mb-8">
                <!-- Total Users -->
                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-blue-900/20 transition-all duration-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-400 text-sm font-medium">Total Users</h3>
                            <p class="text-2xl font-bold mt-1">{{ $userCount }}</p>
                    
                            
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Admin Users -->
                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] p-6 hover:shadow-indigo-900/20 transition-all duration-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                                <i class="fas fa-user-shield text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-400 text-sm font-medium">Admin Users</h3>
                            <p class="text-2xl font-bold mt-1">{{ $adminCount }}</p>
                         <p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600/10 to-indigo-600/5 p-5 flex justify-between items-center border-b border-[#2a2a40]/50">
                    <h3 class="text-xl font-bold">User List</h3>
                   <a href="{{ url('/register') }}" 
                    class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition">
                        <i class="fas fa-plus"></i>
                        <span>Add User</span>
                    </a>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#2a2a40]">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#2a2a40]">
                                <!-- Sample User Row -->
                                <tr class="hover:bg-[#1a1a2e]/50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 p-0.5">
                                                <img src="{{ asset('assets/OIP.jpeg') }}" alt="User" class="h-full w-full rounded-full object-cover">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium">Joan then</div>
                                                <div class="text-xs text-gray-400">@joanthen812@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">@joanthen812@gmail.com</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500/20 text-blue-400">Admin</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Active</span>
                                    </td>
                                </tr>
                                <!-- Add more user rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </main>
    </div>

    <!-- FOOTER -->
    <footer class="relative z-10 py-4 px-8 mt-auto border-t border-[#2a2a40] bg-[#0c0c16]/80 backdrop-blur-md">
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

    <!-- Custom Animations -->
    <style type="text/tailwindcss">
        @layer utilities {
            @keyframes float {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-20px);
                }
            }
            @keyframes drift {
                0% {
                    transform: translate(0, 0) rotate(0deg);
                }
                50% {
                    transform: translate(10px, -10px) rotate(4deg);
                }
                100% {
                    transform: translate(0, 0) rotate(0deg);
                }
            }
            .animate-float {
                animation: float 2.5s ease-in-out infinite;
            }
            .animate-drift {
                animation: drift 3.5s ease-in-out infinite;
            }
        }
    </style>
</body>
</html>