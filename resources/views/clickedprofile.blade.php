<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clicked Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          poppins: ['Poppins', 'sans-serif']
        }
      }
    }
  }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('gambar/fixlogo.png') }}" type="image/png">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-poppins">
  <!-- Popup Container -->
  <div class="relative bg-[#FFFFFF] rounded-xl border-[1px] border-[#000000] shadow-lg w-full max-w-sm p-6 ">
    <!-- Header Profil -->
    <div class="flex items-center space-x-3 mb-4">
        <img src="/gambar/user.png" alt="Avatar" class="w-10 h-10 rounded-full">
        <div>
        <p class="text-sm font-semibold text-gray-800">Nama Pengguna</p>
        <p class="text-xs text-gray-500">@cooknice123</p>
        </div>
    </div>

    <!-- Menu Profil -->
    <div class="space-y-3 text-sm text-gray-700">
        <a href="/halamanprofile" class="flex items-center space-x-2 cursor-pointer hover:text-black">
            <img src="/gambar/user4.png" class="w-4 h-4" />
            <span>Profil</span>
        </a>
        <a href="" class="flex items-center space-x-2 cursor-pointer hover:text-black">
            <img src="/gambar/settings1.png" class="w-4 h-4" />
            <span>Pengaturan</span>
        </a>
    </div>

    <!-- Garis pembatas -->
    <hr class="my-3 border-t border-[#000000]">

    <!-- Tombol Logout -->
    <a href="" class="flex items-center space-x-2 cursor-pointer hover:text-black text-sm">
        <img src="/gambar/logout.png" class="w-4 h-4" />
        <span>Keluar</span>
    </a>
  </div>
</body>