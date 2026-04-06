<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
   protected $table = 'pelanggaran'; 
    protected $primaryKey = 'id_pelanggaran';
    protected $casts = [
        'id_siswa' => 'string',
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'id_guru_bk', 
        'id_siswa', 
        'jenis_pelanggaran', 
        'tanggal', 
        'sanksi', 
        'kategori_sp',
        'poin',
        'keterangan'
    ];

    // RELASI KE SISWA (USER) //
    public function siswa()
    {
        return $this->belongsTo(User::class, 'id_siswa', 'id'); 
    }
   public function guru()
  {
    return $this->belongsTo(GuruBKS::class, 'id_guru_bk', 'id_guru_bk');
  }
}