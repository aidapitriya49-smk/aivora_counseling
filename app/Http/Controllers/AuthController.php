<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            // Tidak perlu memvalidasi 'role' dari request lagi karena kita akan mengisinya manual
        ]);
    
        // Simpan data user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa', // <-- KUNCI DI SINI: Semua yang daftar otomatis jadi siswa
            'poin' => 0,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('dashboard-siswa'); // Langsung lempar ke dashboard siswa
    }
    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil data user yang baru saja login
        $user = Auth::user();

        // CEK ROLE NYA DI SINI
        if ($user->role === 'admin') {
            return redirect()->route('dashboard-admin');
        } elseif ($user->role === 'guru') {
            return redirect()->route('dashboard-guru-bk'); 
        } else {
            return redirect()->route('dashboard-siswa');
        }
    }

    return back()->withErrors(['msg' => 'Login Gagal! Akun tidak ditemukan.']);
}

    public function logout(Request $request) {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login'); // Setelah logout, balik ke halaman login
    }
}
