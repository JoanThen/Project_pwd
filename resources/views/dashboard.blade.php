<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen font-sans bg-gradient-to-bl from-[#121212] via-[#1a1a2e] to-[#16213e] text-white relative overflow-hidden">

    <!-- NAVBAR -->
    <nav class="bg-[#0c0c16]/80 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center border-b border-[#2a2a40]">
        <div class="flex items-center gap-3">
            <div class="text-blue-400 text-2xl">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <h1 class="text-3xl font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-500">
                Dashboard
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
                    <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-full h-full rounded-full object-cover">
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
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-[#1a1a2e] bg-opacity-80 border-l-4 border-blue-500 group">
                        <i class="fas fa-tachometer-alt text-blue-400 w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pengguna') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                        <i class="fas fa-users text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pendataan') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                        <i class="fas fa-clipboard-list text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Pendataan</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('laporan') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-[#1a1a2e] transition group">
                        <i class="fas fa-chart-bar text-gray-400 group-hover:text-blue-400 transition-colors w-5 text-center"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>

            <div class="mt-6 px-4 py-3">
            </div>
            <ul class="space-y-2">
                <li class="mb-1">
                </li>
                <li class="mb-1">
                </li>
            </ul>

            <div class="">
                <div class="flex justify-between items-center mb-3">
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-xs">
                    </div>
                    <div class="flex justify-between items-center text-xs">

                    <div class="flex justify-between items-center text-xs">

                </div>
            </div>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-8 z-10 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-2">Welcome back!</h2>
                <div class="flex items-center text-sm text-gray-400">
                    <span>Here's what's happening with your projects today.</span>
                </div>
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

    <!-- JS for animations -->
    <script>
        // Floating animation for decorative elements
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                });
            }
            
            // Notification dropdown toggle
            const notificationToggle = document.getElementById('notificationToggle');
            const notificationDropdown = document.getElementById('notificationDropdown');
            
            if (notificationToggle && notificationDropdown) {
                notificationToggle.addEventListener('click', function() {
                    notificationDropdown.classList.toggle('hidden');
                });
            }
            
            // Add smooth animation for decorative elements
            const decorElements = document.querySelectorAll('.animate-float, .animate-drift');
            
            decorElements.forEach(element => {
                if (element.classList.contains('animate-float')) {
                    setInterval(() => {
                        element.style.transform = 'translateY(-10px)';
                        setTimeout(() => {
                            element.style.transform = 'translateY(0)';
                        }, 1000);
                    }, 2000);
                }
                
                if (element.classList.contains('animate-drift')) {
                    setInterval(() => {
                        element.style.transform = 'translateX(10px)';
                        setTimeout(() => {
                            element.style.transform = 'translateX(0)';
                        }, 1500);
                    }, 3000);
                }
            });
        });
    </script>
    
</body>
</html>