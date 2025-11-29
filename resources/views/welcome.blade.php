<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Cooknice-Main</title>
    <link rel="icon" href="{{ asset('gambar/fixlogo.png') }}" type="image/png">
  </head>
  
  <body class="bg-[#F9E2AF]">
    <div class="flex h-screen overflow-hidden">
      <!-- Sidebar -->
      <x-Sidebar></x-Sidebar>

      <div class="bg-[#FFFFFF] text-4xl w-[1250px] flex-1 rounded-md m-2 ml-1 border overflow-y-auto">
        <!-- Header -->
        <x-header></x-header>
        
        <div>
          <!-- Logo -->
          <div class="items-center flex justify-center mb-5 mt-5 w-full h-20">
            <img src="{{ asset('gambar/fixlogo.png') }}" alt="logo" class="w-18 rounded-full bg-[#F9E2AF]">
            <img src="{{ asset('gambar/fixtextlogo.png') }}" alt="logo" class="w-50 mt-3 object-cover">
          </div>

          <!-- Search Bar -->
          <form action="{{ route('recipes.search') }}" method="GET" class="flex justify-center my-4 space-x-2">
            <div class="flex items-center border border-gray-300 rounded-2xl px-4 py-2 w-80">
              <img src="{{ asset('gambar/search.png') }}" alt="Search" class="w-5 h-5 mr-2">
              <input 
                type="text" 
                name="query" 
                value="{{ request('query') }}" 
                placeholder="Cari resep disini" 
                class="flex-grow outline-none text-base placeholder-gray-500"
              >
            </div>
            <button type="submit" class="bg-[#F58E4A] text-white text-2xl px-4 py-2 rounded-2xl hover:bg-[#f56c4a] cursor-pointer">
              Cari
            </button>
          </form>

          <!-- Hasil Pencarian atau Pesan -->
          @if (request('query') && $recipes->isEmpty())
            <div class="text-center text-gray-600 mt-4">
              Tidak ada resep ditemukan untuk "{{ request('query') }}".
            </div>
          @elseif (request('query'))
            <div class="text-center text-gray-600 mt-4">
              Hasil pencarian untuk "{{ request('query') }}".
            </div>
          @endif

          <!-- Daftar Resep -->
          <div class="grid grid-cols-4 gap-6 p-4">
            @foreach ($recipes as $recipe)
                <x-cardresep :recipe="$recipe"></x-cardresep>
            @endforeach
          </div>

        </div>
      </div>

    </div>

    <x-clickedprofile></x-clickedprofile>

  </body>
</html>