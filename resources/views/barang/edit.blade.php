<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Edit Item</h2>

    <form action="{{ route('barang.edit', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_item" class="block font-medium mb-1">Nama Item</label>
            <input type="text" name="nama_item" id="nama_item" value="{{ $item->nama_item }}"
                   class="border border-gray-300 p-2 w-full rounded" required>
        </div>
        <div class="mb-4">
            <label for="kategori_id" class="block font-medium mb-1">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="border p-2 w-full rounded" required>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $item->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('barang.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
</body>
</html>