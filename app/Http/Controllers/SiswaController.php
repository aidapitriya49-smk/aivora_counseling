<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggaran;
use App\Models\Konseling;
use App\Models\GuruBKS;

class SiswaController extends Controller
{
    public function index()
    {
        $idSiswa = $this->getSiswaId();
        $jadwalTerdekat = Konseling::with(['guru'])
            ->where('id_siswa', $idSiswa)
            ->whereIn('status', ['pending', 'ya'])
            ->orderBy('tanggal', 'asc')
            ->first();
        $riwayatKonseling = Konseling::where('id_siswa', $idSiswa)
            ->whereIn('status', ['selesai', 'tidak'])
            ->latest()
            ->take(3)
            ->get();
        $poin = Pelanggaran::where('id_siswa', $idSiswa)->sum('poin') ?? 0;
        $totalSesi = Konseling::where('id_siswa', $idSiswa)->where('status', 'selesai')->count();
        $status = "Aktif";
        return view('dashboard-siswa', compact('jadwalTerdekat', 'riwayatKonseling', 'poin', 'totalSesi', 'status')); 
    }

    private function getSiswaId()
    {
        $user = Auth::user();
        $siswa = DB::table('siswa')->where('id_user', $user->id)->first();
        if ($siswa) {
            return $siswa->id_siswa;
        }
        return $user->id_siswa ?? $user->id; 
    }

    // RIWAYAT PELANGGARAN //
    public function riwayatPelanggaran()
    {
        $idSiswa = $this->getSiswaId();
        $pelanggarans = Pelanggaran::where('id_siswa', $idSiswa)->get();
        $totalPoin = $pelanggarans->sum('poin');
        return view('siswa.riwayat_pelanggaran', compact('pelanggarans', 'totalPoin'));
    }

    // HALAMAN BUAT JADWAL //
    public function halamanBuatJadwal()
    {
        $gurus = DB::table('guru_bk')->get(); 
        return view('siswa.buat_jadwal', compact('gurus'));
    }

    // SIMPAN JADWAL //
    public function simpanJadwal(Request $request) 
    {
        $request->validate([
            'id_guru_bk' => 'required',
            'tanggal' => 'required|date',
            'tipe_konseling' => 'required', 
            'catatan_konseling' => 'required'
        ]);
        $idSiswa = $this->getSiswaId();
        if (!$idSiswa) {
            return redirect()->back()->with('error', 'Data profil siswa tidak ditemukan. Silakan hubungi admin.');
        }
        $kuotaTerpakai = Konseling::whereDate('tanggal', $request->tanggal)
                                    ->where('status', '!=', 'tidak')
                                    ->count();
        if ($kuotaTerpakai >= 5) {
            return redirect()->back()->with('error', 'Maaf, kuota untuk tanggal tersebut sudah penuh.');
        }
        $konseling = Konseling::create([
            'id_siswa'          => $idSiswa, 
            'id_guru_bk'        => $request->id_guru_bk,
            'tanggal'           => $request->tanggal,
            'catatan_konseling' => $request->catatan_konseling,
            'tipe_konseling'    => $request->tipe_konseling, 
            'jenis_konseling'   => 'pribadi',
            'status'            => 'pending'
        ]);
        if ($request->tipe_konseling == 'online') {
            $guru = DB::table('guru_bk')->where('id_guru_bk', $request->id_guru_bk)->first();
            $nomorWa = $guru->no_tlp ?? '628123456789'; 
            $pesan = "Halo, saya " . Auth::user()->name . ". Ingin konseling online tgl " . $request->tanggal;
            return redirect()->away("https://wa.me/" . $nomorWa . "?text=" . urlencode($pesan));
        }
        return redirect()->route('siswa.riwayat_konseling')->with('success', 'Pengajuan berhasil!');
    }

    // RIWAYAT KONSELING//
    public function riwayatKonseling()
    {
        $idSiswa = $this->getSiswaId();
        $riwayats = Konseling::with(['guru'])
            ->where('id_siswa', $idSiswa)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.riwayat_konseling', compact('riwayats'));
    }

    // JADWAL KONSELING //
    public function jadwalKonseling()
    {
        $idSiswa = $this->getSiswaId();
        $jadwal = Konseling::with(['guru'])
            ->where('id_siswa', $idSiswa)
            ->whereIn('status', ['pending', 'ya'])
            ->orderBy('tanggal', 'asc')
            ->get();
        return view('siswa.jadwal_konseling', compact('jadwal'));
    }

    
}