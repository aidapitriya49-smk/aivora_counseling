<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    protected $table = 'tindak_lanjut';
    protected $primaryKey = 'id_tindak_lanjut';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_tindak_lanjut', 
        'id_pelanggaran', 
        'id_konseling', 
        'id_siswa', 
        'tindakan', 
        'tanggal', 
        'status', 
        'keterangan'
    ];

    /**
     * Relasi ke Pelanggaran
     * Agar kita bisa tahu tindakan ini untuk kasus pelanggaran yang mana
     */
    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class, 'id_pelanggaran', 'id_pelanggaran');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }
}