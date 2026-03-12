<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // 1. Menampilkan Dashboard Utama dengan Data Real-time
    public function index()
    {
        // Menghitung jumlah berdasarkan role dari database
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuru = User::where('role', 'guru')->count();
        
        // Menghitung total semua pengguna (Siswa + Guru + Admin)
        $totalUser = User::count(); 

        // Mengirimkan variabel ke view 'dashboard-admin'
        return view('dashboard-admin', compact('totalSiswa', 'totalGuru', 'totalUser')); 
    }

    // 2. Menampilkan Form Registrasi Guru
    public function registrasiGuru()
    {
        return view('admin.registrasi_guru');
    }

    // 3. Menampilkan Semua Data Pengguna (Tabel)
    public function dataPengguna()
    {
        $users = User::all(); 
        return view('admin.data_pengguna', compact('users'));
    }

    // 4. Proses Simpan Guru Baru
   public function storeGuru(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'guru'
    ]);

    return redirect()->route('admin.dataPengguna')
    ->with('success','Guru berhasil ditambahkan');
}
    public function dataMaster()
    {
    // Data Real dari Database
    $totalUser = \App\Models\User::count();
    $totalSiswa = \App\Models\User::where('role', 'siswa')->count();
    $totalGuru = \App\Models\User::where('role', 'guru')->count();

    // Data Tambahan (Konseling & Pelanggaran)
    // Sementara 0 jika tabel belum ada, atau ganti dengan hitungan model jika sudah ada
    $totalKonseling = 0; 
    $totalPelanggaran = 0;

    return view('admin.data_master', compact(
        'totalUser', 
        'totalSiswa', 
        'totalGuru', 
        'totalKonseling', 
        'totalPelanggaran'
    ));
    }


public function statistikSistem()
{
    $totalSiswa = \App\Models\User::where('role', 'siswa')->count();
    $totalGuru = \App\Models\User::where('role', 'guru')->count();
    $totalUser = \App\Models\User::count();

    // Simulasi data untuk grafik (bisa dikembangkan nanti)
    $dataGrafik = [
        'Siswa' => $totalSiswa,
        'Guru BK' => $totalGuru,
        'Admin' => $totalUser - ($totalSiswa + $totalGuru)
    ];

    return view('admin.statistik_sistem', compact('totalSiswa', 'totalGuru', 'totalUser', 'dataGrafik'));
}

public function aktivitasTerbaru()
{
    // Mengambil 5 user yang baru saja didaftarkan
    $recentUsers = \App\Models\User::latest()->take(5)->get();
    
    return view('admin.aktivitas_terbaru', compact('recentUsers'));
}

public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('admin.editUser', compact('user'));
}

// UPDATE USER
public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'password' => 'required|min:6'
    ]);

    $passwordBaru = $request->password;

    // Update password di database
    $user->update([
        'password' => Hash::make($passwordBaru)
    ]);

    // Kirim email ke user
    Mail::raw("Password baru akun anda adalah: ".$passwordBaru, function($message) use ($user){
        $message->to($user->email)
        ->subject('Reset Password Sistem E-Counseling');
    });

    return redirect()->route('admin.dataPengguna')
    ->with('success','Password berhasil direset dan dikirim ke email');
}

// DELETE USER
public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.dataPengguna')->with('success','Data berhasil dihapus');
}

// Fungsi untuk menampilkan halaman profil
public function profil()
{
    $admin = DB::table('users')->where('role', 'admin')->first();
    return view('admin.profil', compact('admin'));
}

// Fungsi untuk memproses perubahan data
public function updateProfil(Request $request)
{
    // 1. Ambil data admin lama
    $admin = DB::table('users')->where('role', 'admin')->first();
    $fotoNama = $admin->foto; // Nama foto lama (default)

    // 2. Cek apakah ada file foto baru yang diunggah
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fotoNama = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fotoNama); // Simpan ke folder public/images
    }

    // 3. Update Database
    DB::table('users')->where('role', 'admin')->update([
        'name'  => $request->name,
        'email' => $request->email,
        'foto'  => $fotoNama, // Simpan nama file fotonya
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Profil dan Foto berhasil diperbarui!');
}
}