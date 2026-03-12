<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // <--- INI PENTING (Agar DB tidak merah)
use Illuminate\Support\Str;
use App\Models\Pelanggaran;
use App\Models\Konseling;
use App\Models\Guru;

class SiswaController extends Controller
{
    public function index()
    {
        return view('dashboard-siswa'); 
    }

    public function riwayatPelanggaran()
    {
        $siswa = Auth::user();
        $pelanggarans = Pelanggaran::where('id_siswa', $siswa->id_siswa)->get();
        $totalPoin = $pelanggarans->sum('poin');

        return view('siswa.riwayat_pelanggaran', compact('pelanggarans', 'totalPoin'));
    }

    public function halamanBuatJadwal()
    {
        $tanggalHariIni = date('Y-m-d');
        $kuotaTerpakai = Konseling::where('tanggal', $tanggalHariIni)->count();
        $sisaKuota = 5 - $kuotaTerpakai;

        return view('siswa.buat_jadwal', compact('sisaKuota'));
    }

    public function simpanJadwal(Request $request)
    {
        $jumlahDaftar = Konseling::where('tanggal', date('Y-m-d'))->count();

        if ($jumlahDaftar >= 5) {
            return back()->with('error', 'Gagal: Kuota hari ini sudah habis!');
        }

        Konseling::create($request->all());
        return redirect()->route('siswa.jadwal_konseling')->with('success', 'Jadwal berhasil dibuat!');
    }

    public function jadwalKonseling()
    {
        $jadwals = Konseling::where('id_siswa', Auth::user()->id_siswa)
                      ->orderBy('tanggal', 'desc')
                      ->get();

        return view('siswa.jadwal_konseling', compact('jadwals'));
    }

    public function riwayatKonseling()
    {
        $riwayats = Konseling::where('id_siswa', Auth::user()->id_siswa)
                      ->orderBy('tanggal', 'desc')
                      ->get();

        return view('siswa.riwayat_konseling', compact('riwayats'));
    }
    
    public function profil()
{
    // Mengambil data siswa dengan ID 1 secara manual agar aman dari error Auth
    $siswa = DB::table('siswa')->where('id_siswa', '1')->first();

    return view('siswa.profil', compact('siswa'));
}
}