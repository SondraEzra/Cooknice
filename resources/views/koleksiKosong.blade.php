<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Koleksi</title>
    <link rel="icon" href="{{ asset('gambar/fixlogo.png') }}" type="image/png">
  </head>

  <body class="bg-[#F9E2AF]">
    <div class = "flex h-screen overflow-hidden">
      <!-- Sidebar -->
      <x-sidebar></x-sidebar>

      <div class="bg-[#FFFFFF] text-4xl w-[1250px] flex-1 rounded-md m-2 ml-1 border overflow-y-auto">
        <!-- header -->
        <x-header></x-header>

        <div>

          <b class="mx-4 my-2">
            Koleksi anda
          </b>
          <div class="flex flex-col justify-center items-center h-140">
            <img src="/gambar/lightbulb.png" alt="kosong" class="w-65">
            <b class="m-2">
              Belum ada resep
            </b>
            <p class="text-2xl text-[#00000094]">
              Semua resep yang kamu simpan akan ditampilkan disini
            </p>
          </div>
        </div>
      </div>
    </div>


    <x-clickedprofile></x-clickedprofile>

    

  </body>
</html>