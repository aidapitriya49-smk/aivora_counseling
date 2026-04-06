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
    ]);

    // SIMPAN KE TABEL USERS //
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'siswa',
        'poin' => 0,
    ]);

    // INSERT OTOMATIS KE TABEL SISWA //
    \Illuminate\Support\Facades\DB::table('siswa')->insert([
        'id_user'    => $user->id,
        'id_siswa'   => $user->id, 
        'nama_siswa' => $user->name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    Auth::login($user);
    return redirect()->route('dashboard-siswa');
}
    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // CEK ROLE //
        if ($user->role === 'admin') {
            return redirect()->route('admin.informasiRingkas');
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
    
        return redirect('/login'); 
    }
}
