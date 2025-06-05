<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengembalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-8">
    <h1 class="text-2xl font-bold mb-6">Form Pengembalian</h1>

    <form action="{{ route('pengembalian.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Peminjaman</label>
            <select name="peminjaman_id" required class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded">
                <option value="">-- Pilih --</option>
                @foreach($peminjaman as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_peminjam }} - {{ $p->barang->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded" required>
        </div>  

        <div>
            <label class="block mb-1">Keterangan</label>
            <textarea name="keterangan" rows="3" class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded"></textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('pengembalian.index') }}" class="text-blue-400 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</body>
</html>
