<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <a href="{{ route('recipe.show', $recipe->id) }}" class="block">
        @if($recipe->main_image)
            <img src="{{ asset('storage/' . $recipe->main_image) }}" alt="Menu" class="w-full h-40 object-cover">
        @else
            <img src="https://placehold.co/400x200/cccccc/333333?text=No+Image" alt="No Image" class="w-full h-40 object-cover">
        @endif
        <div class="p-4 flex justify-between items-center">
            <div>
                <h2 class="font-bold text-lg">
                    {{ $recipe->title }}
                </h2>
                <p class="text-sm text-gray-600">
                    {{ $recipe->user->name ?? 'Unknown User' }}
                </p>
            </div>
            <div class="flex items-center">
                @auth
                    <form action="{{ route('favorites.toggle', $recipe->id) }}" method="POST" class="favorite-form inline-flex items-center">
                        @csrf
                        <button type="submit" class="favorite-button inline-flex p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $recipe->favorites()->where('user_id', Auth::id())->exists() ? 'black' : 'none' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="favorite-button inline-flex p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </a>
</div>
