<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     */
    public function showRegistrationForm()
    {
        return view('daftar'); // Mengarahkan ke view daftar.blade.php
    }

    /**
     * Menangani pendaftaran manual.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Simpan data ke database
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::info('Manual Registration Success', ['email' => $request->email]);

            // Login pengguna setelah pendaftaran (opsional)
            Auth::login($user);

            // Redirect ke halaman beranda
            return redirect('/berandaSetelahLogin')->with('success', 'Pendaftaran berhasil! Anda telah login.');
        } catch (\Exception $e) {
            Log::error('Manual Registration Failed', ['error' => $e->getMessage(), 'email' => $request->email]);
            return back()->withErrors(['email' => 'Pendaftaran gagal. Silakan coba lagi.'])->withInput();
        }
    }

    /**
     * Redirect ke Google untuk login.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Menangani callback dari Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
            Log::info('Google Login Attempt', ['email' => $socialUser->email]);

            $existingUser = User::where('email', $socialUser->email)->first();

            if ($existingUser) {
                Auth::login($existingUser);
                Log::info('Google Login Success', ['email' => $socialUser->email]);
                return redirect('/beranda')->with('success', 'Login dengan Google berhasil!');
            } else {
                $newUser = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => Hash::make(uniqid()),
                ]);
                Auth::login($newUser);
                Log::info('Google Register Success', ['email' => $socialUser->email]);
                return redirect('/beranda')->with('success', 'Pendaftaran dengan Google berhasil!');
            }
        } catch (\Exception $e) {
            Log::error('Google Login Failed', ['error' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Login dengan Google gagal: ' . $e->getMessage());
        }
    }

    /**
     * Redirect ke Facebook untuk login.
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Menangani callback dari Facebook.
     */
    public function handleFacebookCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->stateless()->user();
            Log::info('Facebook Login Attempt', ['email' => $socialUser->email]);

            $existingUser = User::where('email', $socialUser->email)->first();

            if ($existingUser) {
                Auth::login($existingUser);
                Log::info('Facebook Login Success', ['email' => $socialUser->email]);
                return redirect('/beranda')->with('success', 'Login dengan Facebook berhasil!');
            } else {
                $newUser = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => Hash::make(uniqid()),
                ]);
                Auth::login($newUser);
                Log::info('Facebook Register Success', ['email' => $socialUser->email]);
                return redirect('/beranda')->with('success', 'Pendaftaran dengan Facebook berhasil!');
            }
        } catch (\Exception $e) {
            Log::error('Facebook Login Failed', ['error' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Login dengan Facebook gagal: ' . $e->getMessage());
        }
    }
}