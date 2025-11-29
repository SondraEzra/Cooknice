<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ganti Email</title>
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
    <div class="relative bg-[#FFFFFF] rounded-xl border-[1px] border-[#000000] shadow-lg w-[500px] p-6">
        <!-- Header -->
        <div class="relative mb-4">
            <div class="flex items-center space-x-2">
                <a href="#" class="text-xl font-bold">&larr;</a>
                    <h2 class="text-lg">Ganti Alamat Email</h2>
            </div>
            <a href="#" class="absolute right-0 top-0 text-xl">&times;</a>
        </div>

        <!-- Form Input -->
        <div class="mt-6 space-y-3 text-[14px] text-gray-600">
            <p>Masukkan alamat email baru. Konfirmasi email akan dikirim</p>
            <input type="email" placeholder="Alamat email baru" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
            <p>Alamat email saat ini: <span class="font-semibold text-black">cooknice123@gmail.com</span></p>
        </div>

        <!-- Tombol Kirim -->
        <div class="flex justify-center mt-4">
            <button type="submit" class="w-[250px] bg-orange-400 hover:bg-orange-500 text-white font-semibold py-2 rounded-md transition">
                Kirim
            </button>
        </div>
    </div>
</body>