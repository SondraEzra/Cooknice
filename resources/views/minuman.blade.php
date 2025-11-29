<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Minuman</title>
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
          <div class="flex justify-center my-4 space-x-2">
            <!-- Search bar -->
            <div class="flex items-center border border-gray-300 rounded-2xl px-4 py-2 w-80">
              <img src="/gambar/search.png" alt="Search" class="w-5 h-5 mr-2">
              <input 
                type="text" 
                placeholder="Cari resep disini" 
                class="flex-grow outline-none text-base placeholder-gray-500"
              >
            </div>

            <!-- Button -->
            <button class="bg-[#F58E4A] text-white text-2xl px-4 py-2 rounded-2xl hover:bg-[#f56c4a] cursor-pointer">
              Cari
            </button>
          </div>

          <b class="mx-4 my-2">
            Minuman
          </b>
          <div class="grid grid-cols-4 gap-6 p-4">
            <!-- Card -->
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