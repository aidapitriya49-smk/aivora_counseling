<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
 protected $table = 'pelanggaran';

    // Menentukan primary key
    protected $primaryKey = 'id_pelanggaran';

    // Karena id_pelanggaran adalah string (bukan auto-increment), set ke false
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom yang bisa diisi (Mass Assignment)
    protected $fillable = [
        'id_pelanggaran', 
        'id_guru_bk', 
        'id_siswa', 
        'jenis_pelanggaran', 
        'tanggal', 
        'poin', 
        'keterangan'
    ];

    /**
     * Relasi ke Siswa
     * Satu pelanggaran dimiliki oleh satu siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    /**
     * Relasi ke Guru BK
     * Satu pelanggaran dicatat oleh satu Guru BK
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru_bk', 'id_guru_bk');
    }
}
