<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman Sign In
     */
    public function signin()
    {
        return view('auth.signin');
    }

    /**
     * Proses Sign In (login)
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Cek apakah email sudah terdaftar
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            // Email belum terdaftar
            return back()->withErrors([
                'email' => 'Email belum terdaftar. Silakan daftar terlebih dahulu.',
            ])->withInput();
        }

        // Email sudah terdaftar, coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/tasks');
        }

        // Email terdaftar tapi password salah
        return back()->withErrors([
            'password' => 'Password yang Anda masukkan salah.',
        ])->withInput();
    }

    /**
     * Tampilkan halaman Sign Up
     */
    public function signup()
    {
        return view('auth.signup');
    }

    /**
     * Proses Sign Up (registrasi pengguna baru)
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username'              => 'required|string|min:3|max:255|unique:users',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:6|confirmed',
        ], [
            'username.required'     => 'Username wajib diisi.',
            'username.min'          => 'Username minimal 3 karakter.',
            'username.max'          => 'Username maksimal 255 karakter.',
            'username.unique'       => 'Username sudah digunakan.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah terdaftar.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 6 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak sesuai.',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/tasks');
    }

    /**
     * Proses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/signin');
    }
}