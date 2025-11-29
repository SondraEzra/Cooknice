<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    public function indexBeforeLogin()
    {
        $recipes = Recipe::with('user')->latest()->get();
        return view('welcome', compact('recipes'));
    }

    public function indexAfterLogin()
    {
        $recipes = Recipe::with('user')->latest()->get();
        return view('berandaSetelahLogin', compact('recipes'));
    }

    public function search(Request $request)
    {
        Log::info('Search request received with query: ' . $request->query('query'));

        $query = trim($request->query('query'));
        $recipes = Recipe::with('user')
            ->when($query, function ($q) use ($query) {
                return $q->where('title', 'LIKE', '%' . $query . '%');
            })
            ->latest()
            ->get();

        Log::info('Found ' . $recipes->count() . ' recipes for query: ' . $query);

        $view = Auth::check() ? 'berandaSetelahLogin' : 'welcome';
        return view($view, compact('recipes'));
    }

    public function showMakanan()
    {
        $category = Category::where('name', 'Makanan')->firstOrFail();
        $recipes = Recipe::where('category_id', $category->id)
                        ->with('user')
                        ->latest()
                        ->get();
        return view('makanan', compact('recipes'));
    }

    public function showMinuman()
    {
        $category = Category::where('name', 'Minuman')->firstOrFail();
        $recipes = Recipe::where('category_id', $category->id)
                        ->with('user')
                        ->latest()
                        ->get();
        return view('minuman', compact('recipes'));
    }

    public function showCemilan()
    {
        $category = Category::where('name', 'Cemilan')->firstOrFail();
        $recipes = Recipe::where('category_id', $category->id)
                        ->with('user')
                        ->latest()
                        ->get();
        return view('cemilan', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('uploadresep', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'porsi' => 'nullable|string',
            'durasi' => 'nullable|string',
            'bahan' => 'required|array',
            'bahan.*' => 'required|string|max:255',
            'langkah' => 'required|array',
            'langkah.*' => 'required|string',
            'foto_langkah' => 'nullable|array',
            'foto_langkah.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('images/recipes', 'public');
            }

            $fotoLangkahPaths = [];
            if ($request->hasFile('foto_langkah')) {
                foreach ($request->file('foto_langkah') as $fotoLangkah) {
                    if ($fotoLangkah && $fotoLangkah->isValid()) {
                        $fotoLangkahPaths[] = $fotoLangkah->store('images/steps', 'public');
                    } else {
                        Log::warning("File langkah tidak valid atau kosong.");
                    }
                }
            }
            
            $recipe = new Recipe();
            $recipe->user_id = Auth::id();
            $recipe->title = $request->title;
            $recipe->description = $request->description;
            $recipe->servings = $request->porsi;
            $recipe->duration = $request->durasi;
            $recipe->category_id = $request->category_id;
            $recipe->main_image = $fotoPath;
            
            $filteredBahan = array_filter($request->bahan, function($value) {
                return is_string($value) && trim($value) !== '';
            });
            $filteredLangkah = array_filter($request->langkah, function($value) {
                return is_string($value) && trim($value) !== '';
            });

            $recipe->ingredients = json_encode(array_values($filteredBahan));
            $recipe->steps = json_encode(array_values($filteredLangkah));
            $recipe->step_images = json_encode(array_values(array_filter($fotoLangkahPaths))); 

            $recipe->save();

            return redirect()->route('welcome')->with('success', 'Resep berhasil diunggah!');
        } catch (\Exception $e) {
            Log::error('Error menyimpan resep: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan resep: ' . $e->getMessage())->withInput();
        }
    }

    public function toggleFavorite(Recipe $recipe)
    {
        try {
            $userId = Auth::id();
            $existingFavorite = Favorite::where('user_id', $userId)
                                       ->where('recipe_id', $recipe->id)
                                       ->first();

            if ($existingFavorite) {
                $existingFavorite->delete();
                return redirect()->back();
            }

            Favorite::create([
                'user_id' => $userId,
                'recipe_id' => $recipe->id,
            ]);

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error mengubah status favorit: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function showFavorites()
    {
        $recipes = Recipe::whereHas('favorites', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('user')->latest()->get();
        
        return view('koleksiAda', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->ingredients = json_decode($recipe->ingredients, true);
        $recipe->steps = json_decode($recipe->steps, true);
        $recipe->step_images = json_decode($recipe->step_images, true);
        return view('halamanResep', compact('recipe'));
    }
}