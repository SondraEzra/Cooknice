<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('user')->get();
        $users = User::all();
        return view('admin.index', compact('recipes', 'users'));
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->back()->with('success', 'Resep berhasil dihapus!');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus!');
    }
}

