<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    // NAMA TABEL DATABASE //
    protected $table = 'konseling';

    // PRIMARY KEY TABEL //
    protected $primaryKey = 'id_konseling';

public $timestamps = true;
    public $incrementing = true; 
    protected $keyType = 'int';

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'id_siswa', 
        'id_guru_bk', 
        'tanggal', 
        'catatan_konseling', 
        'tipe_konseling', 
        'jenis_konseling', 
        'status'
    ];

    /**
     * Relasi ke Guru BK
     * Menghubungkan id_guru_bk di tabel konseling ke id_guru_bk di tabel guru_bk.
     */
    public function guru()
    {
        return $this->belongsTo(GuruBKS::class, 'id_guru_bk', 'id_guru_bk');
    }

    /**
     * Relasi ke Siswa
     * Menghubungkan id_siswa di tabel konseling ke id_siswa di tabel siswa.
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}