<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Admin Panel</title>
</head>
<body class="bg-[#F9E2AF]">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (gunakan komponen existing jika ada) -->
        <x-sidebar></x-sidebar>

        <div class="bg-[#FFFFFF] flex-1 rounded-md m-2 ml-1 border overflow-y-auto p-4">
            <h1 class="text-3xl font-bold mb-4">Panel Admin</h1>

            <!-- Notifikasi Success -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Resep -->
            <h2 class="text-2xl font-semibold mb-2">Daftar Resep</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Judul</th>
                            <th class="border px-4 py-2">Pengguna</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td class="border px-4 py-2">{{ $recipe->title }}</td>
                                <td class="border px-4 py-2">{{ $recipe->user->name ?? 'Unknown' }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.recipe.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus resep ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tabel Pengguna -->
            <h2 class="text-2xl font-semibold mt-6 mb-2">Daftar Pengguna</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Aksi</th> {{-- TAMBAH: Kolom Aksi untuk pengguna --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2"> {{-- TAMBAH: Form tombol hapus untuk pengguna --}}
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini? Semua resep pengguna ini juga akan dihapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
