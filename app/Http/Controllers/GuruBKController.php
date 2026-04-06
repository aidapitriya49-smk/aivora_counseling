<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Pelanggaran;
use App\Models\User;
use App\Models\TindakLanjut;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GuruBKController extends Controller
{
    // DASHBOARD UTAMA GURU BK //
    public function index()
    {
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalPelanggaran = Pelanggaran::count();
        $jadwalHariIni = Konseling::whereDate('tanggal', now()->toDateString())->count();
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        return view('dashboard-guru-bk', compact('totalSiswa', 'totalPelanggaran', 'jadwalHariIni', 'guru'));
    }

    // DATA SISWA //
    public function dataSiswa()
    {
        $siswas = User::where('role', 'siswa')->latest()->get();
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        return view('guru-bk.data_siswa', compact('siswas', 'guru'));
    }

    // DETAIL SISWA //
    public function detailSiswa($id)
    {
        $siswa = User::findOrFail($id); 
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        return view('guru-bk.detail_siswa', compact('siswa', 'guru'));
    }

    // UPDATE SISWA //
    public function updateSiswa(Request $request, $id)
    {
        $siswa = User::findOrFail($id);
        $siswa->update([
            'name'                 => $request->name,
            'email'                => $request->email,
            'nisn'                 => $request->nisn,
            'alamat'               => $request->alamat,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
        ]);
        return redirect()->route('guru-bk.dataSiswa')->with('success', 'Data siswa diperbarui!');
    }

    public function deleteSiswa($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('guru-bk.dataSiswa')->with('success', 'Siswa dihapus!');
    }

    // JADWAL KONSELING //
    public function jadwalKonseling()
    {
        $maksimalKuota = 5;
        $hariIni = now()->toDateString();
        $jadwals = Konseling::with(['siswa'])->latest()->get();
        $terpakai = Konseling::whereDate('tanggal', $hariIni)
                    ->whereIn('status', ['pending', 'ya']) 
                    ->count();
        $sisaKuota = max(0, $maksimalKuota - $terpakai);
        $guru = DB::table('guru_bk')->where('id_user', auth()->id())->first();
        return view('guru-bk.jadwal_konseling', compact('jadwals', 'sisaKuota', 'guru'));
    }

    // PROFIL GURU BK //
    public function profil()
    {
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        return view('guru-bk.profil', compact('guru'));
    }

    public function updateProfil(Request $request)
    {
        $userId = auth()->user()->id;
        $guruLama = DB::table('guru_bk')->where('id_user', $userId)->first();
        $fotoNama = $guruLama->foto ?? null;

        if ($request->hasFile('foto')) {
            if ($fotoNama && file_exists(public_path('images/' . $fotoNama))) {
                unlink(public_path('images/' . $fotoNama));
            }
            $file = $request->file('foto');
            $fotoNama = 'profile_' . $userId . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fotoNama);
        }
        DB::table('guru_bk')->updateOrInsert(
            ['id_user' => $userId],
            [
                'nama_guru_bk'  => $request->nama,
                'nip'           => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto'          => $fotoNama,
                'updated_at'    => now(),
            ]
        );
        return back()->with('success', 'Profil diperbarui!');
    }

    // PELANGGARAN //
    public function pelanggaran()
    {
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        $pelanggarans = Pelanggaran::with('siswa')->latest()->get();
        $siswas = User::where('role', 'siswa')->get(); 
        return view('guru-bk.pelanggaran', compact('pelanggarans', 'siswas', 'guru'));
    }

    public function siswaPelanggaran($id)
{
    $siswa = User::findOrFail($id);
    $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
    // Ambil data pelanggaran khusus siswa ini jika diperlukan
    $pelanggarans = Pelanggaran::where('id_siswa', $id)->latest()->get();

    return view('guru-bk.siswa_pelanggaran', compact('siswa', 'guru', 'pelanggarans'));
}

    public function storePelanggaran(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'jenis_pelanggaran' => 'required',
            'tanggal' => 'required|date',
            'sanksi' => 'required',
            'poin' => 'required|numeric',
        ]);
        $guru = DB::table('guru_bk')->where('id_user', auth()->id())->first();
        if (!$guru) {
            return redirect()->back()->with('error', 'Gagal: Akun tidak terdaftar di guru_bk!');
        }
        
        Pelanggaran::create([
            'id_siswa'          => $request->id_siswa,
            'id_guru_bk'        => $guru->id_guru_bk,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'poin'              => $request->poin,
            'tanggal'           => $request->tanggal,
            'sanksi'            => $request->sanksi,
            'keterangan'        => $request->sanksi,
            'kategori_sp'       => $request->kategori_sp
        ]);
        return redirect()->back()->with('success', 'Data pelanggaran berhasil disimpan!');
    }

    public function hapusPelanggaran($id)
    {
        Pelanggaran::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data pelanggaran berhasil dihapus!');
    }

    // TINDAK LANJUT //
    public function tindakLanjut()
    {
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
        $tindaks = TindakLanjut::with('siswa')->latest()->get();
        return view('guru-bk.tindak_lanjut', compact('tindaks', 'guru'));
    }

    public function buatTindakLanjut($id_pelanggaran) 
    {
        $pelanggaran = Pelanggaran::with('siswa')->findOrFail($id_pelanggaran);
        return view('guru-bk.tindak_lanjut_create', compact('pelanggaran'));
    }

    public function simpanTindakLanjut(Request $request)
    {
        $request->validate(['tindakan' => 'required', 'status' => 'required']);
        TindakLanjut::create([
            'id_tindak_lanjut' => 'TL' . time(), 
            'id_pelanggaran' => $request->id_pelanggaran,
            'id_siswa' => $request->id_siswa,
            'tindakan' => $request->tindakan,
            'tanggal' => now(),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        // Kembali ke route pelanggaran sesuai keinginanmu
        return redirect()->route('guru-bk.pelanggaran')->with('success', 'Tindak lanjut disimpan!');
    }

    // EXPORT PDF LAPORAN //
    public function exportPDF(Request $request)
    {
        $pelanggarans = Pelanggaran::with('siswa')
            ->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai])
            ->get();

        $pdf = Pdf::loadView('guru-bk.cetak_pdf', [
            'pelanggarans' => $pelanggarans,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        return $pdf->download('laporan-pelanggaran.pdf');
    }

    // CETAK SP (FORMAT PDF) //
   public function cetakSP($id)
{
    // Menggunakan variabel $p agar sesuai dengan isi Blade Anda
    $p = Pelanggaran::with('siswa')->findOrFail($id); 

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('guru-bk.cetakSP', compact('p'));

    return $pdf->stream('Surat_SP_'.$p->id.'.pdf');
}

    // WHATSAPP //
    public function kirimWhatsApp(Request $request) 
    {
        $nomor = str_replace([' ', '-', '+'], '', $request->nomor_ortu);
        if (empty($nomor)) { $nomor = '+62'; }
        
        $urlWa = "https://web.whatsapp.com/send?phone=" . $nomor . "&text=" . urlencode($request->isi_surat);
        return redirect()->away($urlWa);
    }

    public function siswaSurat($id)
    {
        // 1. Cari data siswa berdasarkan ID
        $siswa = User::findOrFail($id); 

        // 2. Ambil data profil guru untuk kebutuhan sidebar/layout
        $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();

        // 3. Arahkan ke file view surat_siswa.blade.php
        return view('guru-bk.siswa_surat', compact('siswa', 'guru'));
    }

    public function laporan()
{
    $guru = DB::table('guru_bk')->where('id_user', auth()->user()->id)->first();
    // Ambil data pelanggaran untuk ditampilkan di halaman laporan jika perlu
    $pelanggarans = Pelanggaran::with('siswa')->latest()->get();
    
    return view('guru-bk.laporan', compact('guru', 'pelanggarans'));
}

    // KONSELING UPDATES //
    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:ya,tidak']);
        $konseling = Konseling::where('id_konseling', $id)->firstOrFail();
        $guruData = DB::table('guru_bk')->where('id_user', auth()->id())->first();
        
        $konseling->update([
            'status' => $request->status,
            'id_guru_bk' => $guruData->id_guru_bk ?? null 
        ]);
        return redirect()->back()->with('success', 'Status diperbarui!');
    }

    public function updateTanggal(Request $request, $id)
    {
        $request->validate(['tanggal' => 'required|date']);
        $konseling = Konseling::where('id_konseling', $id)->firstOrFail();
        $konseling->update(['tanggal' => $request->tanggal]);
        return redirect()->back()->with('success', 'Jadwal dipindahkan!');
    }

    public function destroyKonseling($id)
    {
        Konseling::where('id_konseling', $id)->delete();
        return redirect()->back()->with('success', 'Konseling dihapus!');
    }
}