<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengembalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-8">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Daftar Pengembalian</h1>
        <a href="{{ route('pengembalian.create') }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">+ Tambah</a>
    </div>

                    <a href="{{ route('dashboard') }}" class="text-blue-300 hover:underline mb-4 inline-block">← Kembali</a>

    @if (session('success'))
        <div class="bg-green-600 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-gray-800 rounded shadow">
        <thead>
            <tr class="bg-gray-700">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Nama Peminjam</th>
                <th class="px-4 py-2 text-left">Tanggal Pengembalian</th>
                <th class="px-4 py-2 text-left">Keterangan</th>
                <th class="px-4 py-2 text-left">Aksi</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr class="border-t border-gray-700 hover:bg-gray-700">
                    <td class="px-4 py-2">{{ $item->id }}</td>
                    <td class="px-4 py-2">{{ $item->peminjaman->nama_peminjam }}</td>
                    <td class="px-4 py-2">{{ $item->tanggal_pengembalian }}</td>
                    <td class="px-4 py-2">{{ $item->keterangan ?? '-' }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('pengembalian.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
