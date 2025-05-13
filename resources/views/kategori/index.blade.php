<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pendataan - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen font-sans text-white relative overflow-hidden"
      style="background: radial-gradient(circle at center, #0d47a1 0%, #0a1931 60%, #000000 100%);">


    <!-- NAVBAR -->
    <nav class="bg-[#1b263b] px-10 py-4 shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-white">Pendataan Barang</h1>

        <!-- Profile + Logout -->
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:text-blue-300 transition duration-200">Log out</button>
            </form>
            <div class="w-10 h-10">
                <img src="assets/OIP.jpeg" alt="Profile" class="w-10 h-10 rounded-full object-cover">
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="p-8">

        <!-- ✅ Success Message -->
        @if (session('success'))
            <div id="success-alert"
                class="mb-4 bg-green-600 text-white px-6 py-3 rounded shadow animate-fade-in">
                {{ session('success') }}
            </div>
        @endif

        <!-- Kembali -->
        <a href="{{ route('pendataan') }}" class="text-blue-300 hover:underline mb-4 inline-block">← Kembali</a>

        <h2 class="text-xl font-bold mb-4">Pendataan Kategori</h2>

        <!-- Daftar Kategori -->
        <ul class="space-y-2">
            @foreach ($kategoris as $k)
                <li class="bg-[#1e2a38] px-4 py-4 rounded-lg shadow border border-[#324a5e] flex justify-between items-center hover:bg-[#22303f] transition">
                    <span>{{ $k->nama_kategori }}</span>
                    <div class="flex gap-2">
                        <!-- Edit -->
                        <a href="{{ route('kategori.edit', $k->id) }}"
                            class="bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600 transition">Edit</a>

                        <!-- Delete -->
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600 transition">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Tambah Kategori -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('kategori.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded transition hover:bg-blue-600">Tambah Kategori</a>
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

</body>
</html>
