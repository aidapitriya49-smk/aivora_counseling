<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $fillable = [
        'id_siswa', 'id_user', 'nis_siswa', 'nama_siswa', 
        'kelas', 'jurusan', 'no_hp', 'alamat'
    ];
}