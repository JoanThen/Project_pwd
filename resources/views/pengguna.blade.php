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
                Manajemen Pengguna
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
            <button type="button" class="flex items-center gap-2 text-gray-300 hover:text-white transition duration-200">
                <span>Log out</span>
                <i class="fas fa-sign-out-alt"></i>
            </button>
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Add User Form -->
                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600/10 to-indigo-600/5 p-5 border-b border-[#2a2a40]/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                                <i class="fas fa-user-plus text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-bold">Tambah Pengguna</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <form id="addUserForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <i class="fas fa-user text-blue-400 mr-2"></i>
                                    Nama
                                </label>
                                <input type="text" id="userName" class="w-full bg-[#1f1f3f]/40 border border-[#2a2a40] text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3" placeholder="Masukkan nama pengguna" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <i class="fas fa-envelope text-blue-400 mr-2"></i>
                                    Email
                                </label>
                                <input type="email" id="userEmail" class="w-full bg-[#1f1f3f]/40 border border-[#2a2a40] text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3" placeholder="Masukkan email pengguna" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <i class="fas fa-lock text-blue-400 mr-2"></i>
                                    Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="userPassword" class="w-full bg-[#1f1f3f]/40 border border-[#2a2a40] text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3 pr-10" placeholder="Masukkan password" required>
                                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i id="passwordIcon" class="fas fa-eye text-gray-400 hover:text-blue-400"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-plus"></i>
                                Tambah Pengguna
                            </button>
                        </form>
                    </div>
                </div>

                <!-- User List -->
                <div class="bg-gradient-to-br from-[#1f1f3f]/90 to-[#141428]/80 backdrop-blur-sm rounded-xl shadow-lg border border-[#2a2a40] overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600/10 to-blue-600/5 p-5 border-b border-[#2a2a40]/50">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                                <i class="fas fa-list text-indigo-400"></i>
                            </div>
                            <h3 class="text-xl font-bold">Daftar Pengguna</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4 max-h-96 overflow-y-auto" id="userList">
                            <!-- Header -->
                            <div class="grid grid-cols-2 gap-4 text-xs font-medium text-gray-400 uppercase tracking-wider pb-2 border-b border-[#2a2a40]">
                                <div>NAMA</div>
                                <div>EMAIL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('userPassword');
            const passwordIcon = document.getElementById('passwordIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'fas fa-eye-slash text-gray-400 hover:text-blue-400';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'fas fa-eye text-gray-400 hover:text-blue-400';
            }
        }

        // Handle form submission
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            
            if (name && email) {
                addUserToList(name, email);
                
                // Clear form
                document.getElementById('userName').value = '';
                document.getElementById('userEmail').value = '';
                document.getElementById('userPassword').value = '';
                
                // Show success message
                showNotification('Pengguna berhasil ditambahkan!', 'success');
            }
        });

        // Add user to list
        function addUserToList(name, email) {
            const userList = document.getElementById('userList');
            const colors = ['from-blue-500 to-indigo-600', 'from-green-500 to-teal-600', 'from-purple-500 to-pink-600', 'from-orange-500 to-red-600'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            const initial = name.charAt(0).toUpperCase();
            
            const userRow = document.createElement('div');
            userRow.className = 'grid grid-cols-2 gap-4 py-3 hover:bg-[#1a1a2e]/30 rounded-lg transition animate-pulse';
            userRow.innerHTML = `
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-r ${randomColor} flex items-center justify-center">
                        <span class="text-white text-xs font-medium">${initial}</span>
                    </div>
                    <span class="text-gray-200">${name}</span>
                </div>
                <div class="text-gray-300">${email}</div>
            `;
            
            userList.appendChild(userRow);
            
            // Remove animation after 1 second
            setTimeout(() => {
                userRow.classList.remove('animate-pulse');
            }, 1000);
        }

        // Show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 ${
                type === 'success' ? 'bg-green-500/20 border border-green-500 text-green-400' : 'bg-red-500/20 border border-red-500 text-red-400'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Toggle dropdown (for future use)
        function toggleDropdown() {
            // Implementation for dropdown toggle
        }
    </script>

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