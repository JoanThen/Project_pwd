<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori Barang - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2d9d5c36f.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen font-sans text-white relative overflow-hidden"
      style="background: radial-gradient(circle at center, #0d47a1 0%, #0a1931 60%, #000000 100%);">


    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0"
        style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 10 10\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'1\' cy=\'1\' r=\'0.5\' fill=\'%23666\'/%3E%3C/svg%3E'); opacity: 0.03;">
    </div>



    <!-- NAVBAR -->
    <nav class="bg-[#1e1e1e]/90 backdrop-blur-md px-10 py-4 shadow-lg z-10 relative flex justify-between items-center border-b border-[#333]">
        <h1 class="text-2xl font-semibold tracking-wide flex items-center gap-2">
            <i class="fas fa-plus-circle text-blue-400"></i> Tambah Kategori Barang
        </h1>
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:text-[#6aa6ff] transition duration-200">Log out</button>
            </form>
            <div class="w-10 h-10 flex items-center">
                <img src="{{ asset('assets/OIP.jpeg') }}" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10 z-10">
        <div class="max-w-md mx-auto bg-[#1f1f1f]/80 p-6 rounded-2xl shadow-lg border border-[#333] mt-10 text-white backdrop-blur-md ring-1 ring-white/10">
            <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                <i class="fas fa-folder-plus text-[#6aa6ff]"></i> Form Tambah Kategori
            </h2>

            <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_kategori" class="block text-sm font-medium mb-1">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori"
                        class="w-full px-4 py-2 rounded-lg bg-[#2a2a2a] text-white border border-[#444] focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false">
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition-all hover:scale-105 font-medium flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>

            <div class="mt-4">
                <a href="{{ route('kategori.index') }}" class="text-blue-400 hover:underline flex items-center gap-1">
                    <i class="fas fa-arrow-left"></i> Kembali ke daftar
                </a>
            </div>
        </div>
    </main>

    <!-- Custom Animations -->
    <style type="text/tailwindcss">
        @layer utilities {
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-20px); }
            }

            @keyframes drift {
                0% { transform: translate(0, 0) rotate(0deg); }
                50% { transform: translate(10px, -10px) rotate(4deg); }
                100% { transform: translate(0, 0) rotate(0deg); }
            }

            .animate-float { animation: float 2.5s ease-in-out infinite; }
            .animate-drift { animation: drift 3.5s ease-in-out infinite; }
        }
    </style>
</body>

</html>
