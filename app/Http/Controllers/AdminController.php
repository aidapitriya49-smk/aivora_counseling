<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konseling;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // MENAMPILKAN DASHBOARD UTAMA //
    public function index()
    {
        $admin = DB::table('users')->where('role', 'admin')->first();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuru = User::where('role', 'guru')->count();
        $totalUser = User::count(); 
        return view('dashboard-admin', compact('totalSiswa', 'totalGuru', 'totalUser', 'admin')); 
    }

    // UNTUK SIDEBAR AGAR TIDAK ERROR //
    public function informasiRingkas()
    {
        return $this->index(); 
    }

    // MENAMPILKAN FORM REGISTRASI GURU // 
    public function registrasiGuru()
    {
        return view('admin.registrasi_guru');
    }

    // MENAMPILKAN SEMUA DATA PENGGUNA (TABEL) // 
    public function dataPengguna()
    {
        $users = User::all(); 
        return view('admin.data_pengguna', compact('users'));
    }

    // PROSES SIMPAN GURU BARU // 
    public function storeGuru(Request $request)
    {
    // VALIDASI INPUT //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
    ]);

    // SIMPAN KE TABEL 'USERS' (AKUN LOGIN) //
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'guru'
    ]);

    \Illuminate\Support\Facades\DB::table('guru_bk')->insert([
        'id_user'      => $user->id,         
        'nama_guru_bk' => $user->name,       
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);

    return redirect()->route('admin.dataPengguna')->with('success','Guru berhasil ditambahkan');
  }

    // DATA MASTER //
    public function dataMaster()
    {
        $totalUser = User::count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuru = User::where('role', 'guru')->count();
        $totalKonseling = 0; 
        $totalPelanggaran = 0;
        return view('admin.data_master', compact('totalUser', 'totalSiswa', 'totalGuru', 'totalKonseling', 'totalPelanggaran'));
    }

    // DATA STATISTIKA SISTEM //
   public function statistikSistem()
{
    $bulanIni = date('m');
    $tahunIni = date('Y');
    $admin = Auth::user();

    // Mengambil data pendaftaran per minggu HANYA untuk bulan berjalan
    $minggu1 = Konseling::whereYear('created_at', $tahunIni)->whereMonth('created_at', $bulanIni)
                ->whereBetween(DB::raw('DAY(created_at)'), [1, 7])->count();
    $minggu2 = Konseling::whereYear('created_at', $tahunIni)->whereMonth('created_at', $bulanIni)
                ->whereBetween(DB::raw('DAY(created_at)'), [8, 14])->count();
    $minggu3 = Konseling::whereYear('created_at', $tahunIni)->whereMonth('created_at', $bulanIni)
                ->whereBetween(DB::raw('DAY(created_at)'), [15, 21])->count();
    $minggu4 = Konseling::whereYear('created_at', $tahunIni)->whereMonth('created_at', $bulanIni)
                ->whereBetween(DB::raw('DAY(created_at)'), [22, 31])->count();

    $dataGrafik = [
        'Minggu 1' => $minggu1,
        'Minggu 2' => $minggu2,
        'Minggu 3' => $minggu3,
        'Minggu 4' => $minggu4,
    ];

    // Jika tidak ada data sama sekali, total akan menjadi 0.
    $totalKonselingBulanIni = array_sum($dataGrafik);

    return view('admin.statistik_sistem', compact('dataGrafik', 'totalKonselingBulanIni', 'admin'));
}

    // AKTIVITAS TERBARU //
    public function aktivitasTerbaru()
    {
        $recentUsers = User::latest()->take(5)->get();
        return view('admin.aktivitas_terbaru', compact('recentUsers'));
    }

    // EDIT USER //
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    // UPDATE USER & RESET PASSWORD // 
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(['password' => 'required|min:6']);

        $user->update(['password' => Hash::make($request->password)]);

        // MENGIRIM EMAIL NOTIFIKASI BARU //
        Mail::raw("Password baru anda adalah: ".$request->password, function($message) use ($user){
            $message->to($user->email)->subject('Reset Password Sistem E-Counseling');
        });

        return redirect()->route('admin.dataPengguna')->with('success','Password berhasil direset');
    }

    // HAPUS USER //
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dataPengguna')->with('success','Data berhasil dihapus');
    }

    // PROFIL ADMIN //
    public function profil()
    {
        $admin = DB::table('users')->where('role', 'admin')->first();
        return view('admin.profil', compact('admin'));
    }

    // UPDATE PROFIL ADMIN //
    public function updateProfil(Request $request)
    {
        $admin = DB::table('users')->where('role', 'admin')->first();
        $fotoNama = $admin->foto; 
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoNama = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fotoNama);
        }
        DB::table('users')->where('role', 'admin')->update([
            'name'  => $request->name,
            'email' => $request->email,
            'foto'  => $fotoNama,
            'updated_at' => now(),
        ]);
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}