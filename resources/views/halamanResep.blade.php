@extends('layouts.app')

@section('title', 'Cooknice - ' . ($recipe->title ?? 'Resep'))

@section('content')
    <div class="flex h-screen overflow-hidden">
        <x-sidebar></x-sidebar> 

        <div class="bg-white w-full flex-1 rounded-md m-2 ml-1 border overflow-y-auto">
            <x-header></x-header>

            <div class="p-6">
                <div class="flex flex-wrap gap-4">
                    <div class="flex-shrink-0">
                        @if($recipe->main_image)
                            <img src="{{ asset('storage/' . $recipe->main_image) }}" alt="{{ $recipe->title }}" class="w-64 h-64 object-cover rounded-2xl shadow-md">
                        @else
                            <img src="https://placehold.co/256x256/cccccc/333333?text=No+Image" alt="No Image" class="w-64 h-64 object-cover rounded-2xl bg-gray-200 shadow-md">
                        @endif
                    </div> 

                    <div class="flex flex-col justify-between flex-1 min-w-[300px]">
                        <div>
                            <h1 class="text-3xl font-bold mb-1 text-gray-900">{{ $recipe->title }}</h1>
                            <a href="{{ route('profile.show', $recipe->user->id ?? '') }}" class="inline-flex items-center gap-2 mb-2 px-2 py-1 rounded hover:bg-gray-100">
                                {{-- foto profil pengunggah --}}
                                <img 
                                src="{{ $recipe->user->profile_picture ? asset('storage/' . $recipe->user->profile_picture) : asset('gambar/profile.png') }}" 
                                alt="profil" 
                                class="w-10 h-10 border-2 rounded-full border-[#F58E4A] object-cover">

                                <div>
                                    <p class="font-semibold text-gray-800">{{ $recipe->user->name ?? 'Pengguna Tidak Dikenal' }}</p>
                                    @if($recipe->user->username)
                                        <p class="text-sm text-gray-500">{{ $recipe->user->username ? str_replace('@', '', $recipe->user->username) : '' }}</p>
                                    @endif
                                </div>
                            </a>

                            <p id="deskripsi" class="text-gray-700 {{ Str::length($recipe->description) > 150 ? 'line-clamp-2' : '' }}">
                                {{ $recipe->description }}
                            </p>
                            @if(Str::length($recipe->description) > 150)
                                <button onclick="toggleDeskripsi()" class="text-[#F58E4A] hover:underline cursor-pointer font-bold text-sm mt-1">Lebih Banyak 
                                    <span id="arrow">▼</span>
                                </button>
                            @endif
                        </div>

                        <div class="mt-4">
                            @if(Auth::check())
                                <form action="{{ route('favorites.toggle', $recipe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-white font-semibold px-4 py-2 rounded-lg flex items-center gap-2 bg-[#F58E4A] hover:bg-[#f56c4a] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="{{ Auth::check() && $recipe->favorites()->where('user_id', Auth::id())->exists() ? '#F58E4A' : 'white' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                        </svg>
                                        {{ Auth::check() && $recipe->favorites()->where('user_id', Auth::id())->exists() ? 'Hapus dari Koleksi' : 'Tambahkan ke Koleksi' }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-white font-semibold px-4 py-2 rounded-lg flex items-center gap-2 bg-[#F58E4A] hover:bg-[#f56c4a] cursor-pointer w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                    Login untuk Menambahkan ke Koleksi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-6 gap-10">
                    <div class="mt-2 text-base flex items-center gap-2 text-black w-1/4 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#F58E4A]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        {{ $recipe->servings ?? 'N/A' }} Porsi
                    </div>

                    <div class="mt-2 text-base flex items-center gap-2 text-black w-full font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#F58E4A]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ $recipe->duration ?? 'N/A' }} Menit
                    </div>
                </div>
                <div class="flex justify-between mt-10 gap-10">
                    <div class="w-1/4">
                        <h2 class="text-2xl font-bold mb-4 text-gray-900">Bahan-bahan</h2>
                        @if(is_array($recipe->ingredients) && count($recipe->ingredients) > 0)
                            <ul class="list-disc list-inside space-y-2 text-lg text-gray-800">
                                @foreach($recipe->ingredients as $ingredient)
                                    <li class="border-b border-dotted border-gray-400 font-medium pb-1">{{ $ingredient }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600">Tidak ada informasi bahan-bahan.</p>
                        @endif
                    </div>

                    <div class="w-full">
                        <h2 class="text-2xl font-bold mb-4 text-gray-900">Cara Membuat</h2>
                        @if(is_array($recipe->steps) && count($recipe->steps) > 0)
                            <ol class="list-decimal pl-5 space-y-6 text-lg text-gray-800">
                                @foreach($recipe->steps as $index => $step)
                                    <li>
                                        <p class="mb-2">{{ $step }}</p>
                                        @if(isset($recipe->step_images[$index]) && $recipe->step_images[$index])
                                            <img src="{{ asset('storage/' . $recipe->step_images[$index]) }}" class="w-64 h-48 object-cover rounded-lg mt-1 shadow-sm" alt="Langkah {{ $index + 1 }}">
                                        @else
                                            
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <p class="text-gray-600">Tidak ada informasi cara membuat.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-clickedprofile></x-clickedprofile>

    <script>
        function toggleDeskripsi() {
            const desc = document.getElementById("deskripsi");
            const arrow = document.getElementById("arrow");

            if (desc.classList.contains("line-clamp-2")) {
                desc.classList.remove("line-clamp-2");
                arrow.innerText = "▲";
            } else {
                desc.classList.add("line-clamp-2");
                arrow.innerText = "▼";
            }
        }
    </script>

@endsection