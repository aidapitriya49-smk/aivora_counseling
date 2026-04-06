<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruBKController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\TindakLanjutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

    // AUTENTIKASI //
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // MIDDLEWARE AUTH //
    Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // DASHBOARD BERDASARKAN ROLE //
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.informasiRingkas');
    Route::get('/dashboard-guru-bk', [GuruBKController::class, 'index'])->name('dashboard-guru-bk');
    Route::get('/dashboard-siswa', [SiswaController::class, 'index'])->name('dashboard-siswa');
    
    // KELOMPOK ROUTE: ADMIN //
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('informasiRingkas');
    Route::get('/data-pengguna', [AdminController::class, 'dataPengguna'])->name('dataPengguna');
    Route::get('/data-master', [AdminController::class, 'dataMaster'])->name('dataMaster');
    Route::get('/statistik', [AdminController::class, 'statistikSistem'])->name('statistikSistem');
    Route::get('/registrasi-guru', [AdminController::class, 'registrasiGuru'])->name('registrasiGuru');
    Route::post('/tambah-guru', [AdminController::class, 'storeGuru'])->name('storeGuru');
    Route::get('/aktivitas', [AdminController::class, 'aktivitasTerbaru'])->name('aktivitasTerbaru');
    Route::get('/edit-user/{id}', [AdminController::class, 'editUser'])->name('editUser');
    Route::put('/update-user/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::delete('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/profil', [AdminController::class, 'profil'])->name('profil');
    Route::post('/profil/update', [AdminController::class, 'updateProfil'])->name('update_profil');
    });

    // KELOMPOK ROUTE: GURU BK //
    Route::prefix('guru-bk')->name('guru-bk.')->group(function () {
    Route::get('/data-siswa', [GuruBKController::class, 'dataSiswa'])->name('dataSiswa');
    Route::get('/detail-siswa/{id}', [GuruBKController::class, 'detailSiswa'])->name('detail_siswa');
    Route::put('/update-siswa/{id}', [GuruBKController::class, 'updateSiswa'])->name('update_siswa'); 
    Route::delete('/delete-siswa/{id}', [GuruBKController::class, 'deleteSiswa'])->name('delete_siswa');
    Route::get('/jadwal-konseling', [GuruBKController::class, 'jadwalKonseling'])->name('jadwal-konseling');
    Route::patch('/update-tanggal/{id}', [GuruBKController::class, 'updateTanggal'])->name('update-tanggal');
    Route::patch('/update-status/{id}', [GuruBKController::class, 'updateStatus'])->name('update-status');
    Route::delete('/delete-konseling/{id}', [GuruBKController::class, 'destroyKonseling'])->name('delete-konseling');
    Route::get('/pelanggaran', [GuruBKController::class, 'pelanggaran'])->name('pelanggaran');
    Route::get('/tindak-lanjut', [GuruBKController::class, 'tindakLanjut'])->name('tindak_lanjut');
    Route::get('/pelanggaran/siswa/{id}', [GuruBKController::class, 'siswaPelanggaran'])->name('siswa_pelanggaran');
    Route::post('/pelanggaran/store', [GuruBKController::class, 'storePelanggaran'])->name('storePelanggaran');
    Route::delete('/pelanggaran/hapus/{id}', [GuruBKController::class, 'hapusPelanggaran'])->name('hapusPelanggaran');
    Route::get('/guru-bk/tindak-lanjut/buat/{id_pelanggaran}', [App\Http\Controllers\GuruBKController::class, 'buatTindakLanjut'])->name('guru-bk.tindak-lanjut.create');
    Route::post('/guru-bk/tindak-lanjut/simpan', [App\Http\Controllers\GuruBKController::class, 'simpanTindakLanjut'])->name('guru-bk.tindak-lanjut.store');
    Route::get('/cetak-sp/{id}', [GuruBKController::class, 'cetakSP'])->name('cetakSP');
    Route::get('/surat/siswa/{id}', [GuruBKController::class, 'siswaSurat'])->name('siswa_surat');
    Route::post('/kirim-wa', [GuruBKController::class, 'kirimWhatsApp'])->name('kirim_wa');
    Route::get('/laporan', [GuruBKController::class, 'laporan'])->name('laporan');
    Route::post('/laporan/export', [GuruBKController::class, 'exportPDF'])->name('export');
    Route::get('/backup', [BackupController::class, 'index'])->name('backup'); // Nama route jadi guru-bk.backup
    Route::get('/download-backup', [BackupController::class, 'download'])->name('download'); // Nama route jadi guru-bk.download
    Route::get('/profil', [GuruBKController::class, 'profil'])->name('profil');
    Route::post('/profil/update', [GuruBKController::class, 'updateProfil'])->name('update_profil');
    });

    // KELOMPOK ROUTE: SISWA //
    Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/riwayat-pelanggaran', [SiswaController::class, 'riwayatPelanggaran'])->name('riwayat_pelanggaran');
    Route::get('/buat-jadwal', [SiswaController::class, 'halamanBuatJadwal'])->name('buat_jadwal');
    Route::post('/simpan-jadwal', [SiswaController::class, 'simpanJadwal'])->name('simpan_jadwal');
    Route::get('/jadwal-konseling', [SiswaController::class, 'jadwalKonseling'])->name('jadwal_konseling');
    Route::get('/riwayat-konseling', [SiswaController::class, 'riwayatKonseling'])->name('riwayat_konseling');
    Route::get('/profil', [SiswaController::class, 'profil'])->name('profil');
    Route::post('/profil/update', [SiswaController::class, 'updateProfil'])->name('update_profil');
    });
});

if (file_exists(__DIR__.'/settings.php')) {
    require __DIR__.'/settings.php';
}