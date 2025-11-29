<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('editprofile');
    }

    public function update(Request $request)
    {
        Log::info('Profile update request received with data:', $request->all());
        Log::info('Files in request:', $request->files->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'profile_description' => 'nullable|string|max:1000',
        ]);

        try {
            $user = Auth::user();
            $data = [
                'name' => $request->name,
                'profile_description' => $request->profile_description,
            ];

            if ($request->hasFile('profile_picture')) {
                Log::info('File profile_picture detected: ' . $request->file('profile_picture')->getClientOriginalName());
                if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                    Log::info('Deleting old profile picture: ' . $user->profile_picture);
                    Storage::disk('public')->delete($user->profile_picture);
                }
                $path = $request->file('profile_picture')->store('images/profiles', 'public');
                Log::info('New profile picture stored at: ' . $path);
                $data['profile_picture'] = $path;
            } else {
                Log::info('No profile_picture file uploaded.');
            }

            Log::info('Data to update: ' . json_encode($data));
            $updated = $user->update($data);
            Log::info('Update result: ' . ($updated ? 'Success' : 'Failed'));

            if (!$updated) {
                Log::warning('Failed to update user profile in database.');
                return redirect()->back()->with('error', 'Gagal memperbarui profil di database.')->withInput();
            }

            return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage())->withInput();
        }
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|current_password',
        ]);

        try {
            $user->update([
                'email' => $validated['email'],
            ]);

            return redirect()->route('profile.show')->with('success', 'Email berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error memperbarui email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui email: ' . $e->getMessage())->withInput();
        }
    }

    public function show()
    {
        $recipes = Recipe::where('user_id', Auth::id())
                        ->with('user')
                        ->latest()
                        ->get();
        return view('halamanprofile', compact('recipes'));
    }
}