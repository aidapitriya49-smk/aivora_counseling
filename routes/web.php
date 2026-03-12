<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruBKController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');
    Route::get('/dashboard-guru-bk', [GuruBKController::class, 'index'])->name('dashboard-guru-bk');
    Route::get('/dashboard-siswa', [SiswaController::class, 'index'])->name('dashboard-siswa');
    
    //Admin
    Route::get('/admin/data-pengguna', [AdminController::class, 'dataPengguna'])->name('admin.dataPengguna');
    Route::get('/admin/registrasi-guru', [AdminController::class, 'registrasiGuru'])->name('admin.registrasiGuru');
    Route::post('/admin/tambah-guru', [AdminController::class, 'storeGuru'])->name('admin.storeGuru');
    Route::get('/admin/data-master', [AdminController::class, 'dataMaster'])->name('admin.dataMaster');
    Route::get('/admin/informasi-ringkas', [AdminController::class, 'informasiRingkas'])->name('admin.informasiRingkas');
    Route::get('/admin/statistik-sistem', [AdminController::class, 'statistikSistem'])->name('admin.statistikSistem');
    Route::get('/admin/aktivitas-terbaru', [AdminController::class, 'aktivitasTerbaru'])->name('admin.aktivitasTerbaru');
    Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::put('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::post('/admin/profil/update', [AdminController::class, 'updateProfil'])->name('admin.update_profil');


    //Guru BK
    Route::get('/guru-bk/data-siswa', [GuruBKController::class, 'dataSiswa'])->name('guru-bk.dataSiswa');
    Route::get('/guru-bk/jadwal-konseling', [GuruBKController::class, 'jadwalKonseling'])->name('guru-bk.jadwal-konseling');
    Route::get('/guru-bk/pelanggaran', [GuruBKController::class, 'pelanggaran'])->name('guru-bk.pelanggaran');
    Route::get('/guru-bk/tindak-lanjut', [GuruBKController::class, 'tindakLanjut'])->name('guru-bk.tindak_lanjut');
    Route::put('/guru-bk/siswa/update/{id}', [GuruBKController::class, 'updateSiswa'])->name('guru-bk.update_siswa');
    Route::get('/guru-bk/siswa/detail/{id}', [GuruBKController::class, 'detailSiswa'])->name('guru-bk.detail_siswa');
    Route::get('/guru-bk/profil', [GuruBKController::class, 'profil'])->name('guru-bk.profil');
    Route::post('/guru-bk/profil/update', [GuruBKController::class, 'updateProfil'])->name('guru-bk.update_profil');

    //Siswa
    Route::get('/siswa/riwayat-pelanggaran', [SiswaController::class, 'riwayatPelanggaran'])->name('siswa.riwayat_pelanggaran');
    Route::get('/siswa/buat-jadwal', [SiswaController::class, 'halamanBuatJadwal'])->name('siswa.buat_jadwal');
    Route::post('/siswa/simpan-jadwal', [SiswaController::class, 'simpanJadwal'])->name('siswa.simpan_jadwal');
    Route::get('/siswa/jadwal-konseling', [App\Http\Controllers\SiswaController::class, 'jadwalKonseling'])->name('siswa.jadwal_konseling');
    Route::get('/siswa/riwayat-konseling', [App\Http\Controllers\SiswaController::class, 'riwayatKonseling'])->name('siswa.riwayat_konseling');
    Route::get('/siswa/ajukan', [App\Http\Controllers\SiswaController::class, 'formAjukan'])->name('siswa.form_ajukan');
    Route::post('/siswa/simpan-pengajuan', [App\Http\Controllers\SiswaController::class, 'simpanPengajuan'])->name('siswa.simpan_pengajuan');
    Route::get('/siswa/profil', [SiswaController::class, 'profil'])->name('siswa.profil');

    // 3. Route Umum
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

if (file_exists(__DIR__.'/settings.php')) {
    require __DIR__.'/settings.php';
}