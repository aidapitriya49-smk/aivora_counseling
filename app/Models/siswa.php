<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    // Mengarahkan ke tabel yang benar di database
    protected $table = 'pelanggaran';
    
    // Memberitahu Laravel bahwa ID bukan auto-incrementing
    protected $primaryKey = 'id_pelanggaran';
    public $incrementing = false;
    protected $keyType = 'string';

    // Daftar kolom yang boleh diisi (wajib sesuai migrasi)
    protected $fillable = [
        'id_pelanggaran', 
        'id_guru_bk', 
        'id_siswa', 
        'jenis_pelanggaran', 
        'tanggal', 
        'poin', 
        'keterangan'
    ];

    // Relasi ke tabel siswa (pastikan model siswa ada di app/Models/siswa.php)
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}