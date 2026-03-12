<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuruBKController extends Controller
{
    public function index()
    {
        return view('dashboard-guru-BK');
    }


public function dataSiswa()
{
    // Mengambil pengguna dengan role 'siswa'
    $siswas = \App\Models\User::where('role', 'siswa')->latest()->get();
    
    return view('guru-bk.data_siswa', compact('siswas'));
}

public function jadwalKonseling()
{
    
    $jadwals = \App\Models\Konseling::with(['siswa', 'guru'])
        ->orderBy('tanggal', 'desc')
        ->get();

    
    $kuotaHariIni = \App\Models\Konseling::whereDate('tanggal', now()->toDateString())->count();
    $sisaKuota = 5 - $kuotaHariIni;

    
    return view('guru-bk.jadwal_konseling', compact('jadwals', 'sisaKuota'));
}

public function pelanggaran()
{
    // Mengambil data pelanggaran dengan relasi siswa
    $pelanggarans = \App\Models\Pelanggaran::with('siswa')
        ->latest()
        ->get();

    return view('guru-bk.pelanggaran', compact('pelanggarans'));
}

public function tindakLanjut()
{
    // Mengambil data tindak lanjut beserta relasi ke siswa
    $tindaks = \App\Models\TindakLanjut::with('siswa')->latest()->get();

    return view('guru-bk.tindak_lanjut', compact('tindaks'));
}

public function detailSiswa($id)
{
    // Mengambil data spesifik siswa
    $siswa = \App\Models\DataSiswa::findOrFail($id);
    return view('guru-bk.detail_siswa', compact('siswa'));
}

public function updateSiswa(Request $request, $id)
{
    $siswa = \App\Models\DataSiswa::findOrFail($id);
    $siswa->update($request->all());
    return redirect()->route('guru-bk.data_siswa')->with('success', 'Data berhasil diupdate!');
}

public function profil()
    {
        // Mengambil data guru (sementara ID 1 agar aman saat demo)
        $guru = DB::table('guru_bk')->where('id_guru_bk', '1')->first();
        
        return view('guru-bk.profil', compact('guru'));
    }

    public function updateProfil(Request $request)
{
    $guruLama = DB::table('guru_bk')->where('id_guru_bk', 1)->first();
    $fotoNama = $guruLama->foto ?? null;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fotoNama = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fotoNama);
    }

    DB::table('guru_bk')->where('id_guru_bk', 1)->update([
        'nama_guru_bk' => $request->nama,
        'nip'          => $request->nip,
        'foto'         => $fotoNama,
        'updated_at'   => now(),
    ]);

    return back()->with('success', 'Profil berhasil diperbarui!');
    }

}