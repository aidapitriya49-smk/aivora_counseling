<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    protected $table = 'tindak_lanjut';

    // Primary key
    protected $primaryKey = 'id_tindak_lanjut';

    // Karena id bukan auto-increment
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'id_tindak_lanjut', 
        'id_konseling', 
        'id_siswa', 
        'tindakan', 
        'tanggal', 
        'status', 
        'keterangan'
    ];

    /**
     * Relasi ke Siswa
     * Satu tindak lanjut selalu berkaitan dengan satu siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    /**
     * Relasi ke Konseling
     * Tindak lanjut bisa berasal dari sebuah sesi konseling
     */
    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }
}
