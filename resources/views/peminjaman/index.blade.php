<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen font-sans text-gray-100 bg-gradient-to-br from-blue-900 via-gray-900 to-black">
    <!-- Navbar -->
    <nav class="bg-gray-800 px-6 py-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <i class="fas fa-box-open text-blue-400 text-xl"></i>
                <h1 class="text-xl font-bold">SARPRAS - Peminjaman Barang</h1>
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

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Notifications -->
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

        @if (session('error'))
            <div id="error-alert" class="mb-6 bg-red-600/90 text-white px-6 py-3 rounded-lg shadow-lg flex justify-between items-center animate-fade-in">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    {{ session('error') }}
                </div>
                <button onclick="document.getElementById('error-alert').remove()" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <!-- Header and Back Button -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('dashboard') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Peminjaman
            </a>
        </div>

        <!-- Filter Status -->
        <div class="mb-6 flex flex-wrap gap-2">
            <a href="{{ route('peminjaman.index') }}" 
               class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}">
                <i class="fas fa-list mr-1"></i> Semua
            </a>
            <a href="{{ route('peminjaman.index', ['status' => 'pending']) }}" 
               class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'pending' ? 'bg-yellow-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}">
                <i class="fas fa-clock mr-1"></i> Pending
            </a>
            <a href="{{ route('peminjaman.index', ['status' => 'approved']) }}" 
               class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'approved' ? 'bg-green-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}">
                <i class="fas fa-check-circle mr-1"></i> Approved
            </a>
            <a href="{{ route('peminjaman.index', ['status' => 'rejected']) }}" 
               class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') == 'rejected' ? 'bg-red-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}">
                <i class="fas fa-times-circle mr-1"></i> Rejected
            </a>
        </div>

        <!-- Table -->
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl overflow-hidden shadow-xl border border-gray-700/50">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700/60">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Peminjam</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Barang</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-blue-300 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-right text-sm font-medium text-blue-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        @forelse ($data as $index => $peminjaman)
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->nama_peminjam }}</td>
                            <td class="px-6 py-4">{{ optional($peminjaman->barang)->nama ?? 'Barang tidak ditemukan' }}</td>
                            <td class="px-6 py-4">{{ $peminjaman->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                @if($peminjaman->status == 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-600/80 text-white">
                                        <i class="fas fa-clock mr-1"></i> Pending
                                    </span>
                                @elseif($peminjaman->status == 'approved')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-600/80 text-white">
                                        <i class="fas fa-check-circle mr-1"></i> Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-600/80 text-white">
                                        <i class="fas fa-times-circle mr-1"></i> Rejected
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ $peminjaman->keterangan ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                @if($peminjaman->status == 'pending')
                                    <button onclick="openApproveModal({{ $peminjaman->id }})" 
                                            class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 rounded-lg text-xs transition-colors">
                                        <i class="fas fa-check mr-1"></i> Approve
                                    </button>
                                    <button onclick="openRejectModal({{ $peminjaman->id }})" 
                                            class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 rounded-lg text-xs transition-colors">
                                        <i class="fas fa-times mr-1"></i> Reject
                                    </button>
                                    <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-xs transition-colors">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                @endif
                                
                                @if($peminjaman->approved_by)
                                    <div class="text-xs text-gray-400 mt-1 text-right">
                                        by {{ $peminjaman->approvedBy->name ?? 'Unknown' }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-400">Tidak ada data peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal Approve -->
    <div id="approveModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-gray-800 p-6 rounded-xl max-w-md w-full mx-4 border border-gray-700">
            <h3 class="text-lg font-semibold mb-4 text-white flex items-center">
                <i class="fas fa-check-circle text-green-400 mr-2"></i> Approve Peminjaman
            </h3>
            <form id="approveForm" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="approve_keterangan" class="block text-sm font-medium text-gray-300 mb-2">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="approve_keterangan" rows="3" 
                              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white"
                              placeholder="Masukkan keterangan..."></textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('approveModal').classList.add('hidden')" 
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                        <i class="fas fa-check mr-1"></i> Approve
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Reject -->
    <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-gray-800 p-6 rounded-xl max-w-md w-full mx-4 border border-gray-700">
            <h3 class="text-lg font-semibold mb-4 text-white flex items-center">
                <i class="fas fa-times-circle text-red-400 mr-2"></i> Reject Peminjaman
            </h3>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="reject_keterangan" class="block text-sm font-medium text-gray-300 mb-2">Alasan Reject</label>
                    <textarea name="keterangan" id="reject_keterangan" rows="3" 
                              class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 text-white"
                              placeholder="Masukkan alasan reject..." required></textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" 
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        <i class="fas fa-times mr-1"></i> Reject
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');
            if (successAlert) successAlert.remove();
            if (errorAlert) errorAlert.remove();
        }, 5000);

        // Modal functions
        function openApproveModal(id) {
            const form = document.getElementById('approveForm');
            form.action = `/peminjaman/${id}/approve`;
            document.getElementById('approveModal').classList.remove('hidden');
        }

        function openRejectModal(id) {
            const form = document.getElementById('rejectForm');
            form.action = `/peminjaman/${id}/reject`;
            document.getElementById('rejectModal').classList.remove('hidden');
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('approveModal')) {
                document.getElementById('approveModal').classList.add('hidden');
            }
            if (event.target == document.getElementById('rejectModal')) {
                document.getElementById('rejectModal').classList.add('hidden');
            }
        }
    </script>

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
</body>
</html>