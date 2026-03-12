<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $fillable = [
    'nisn', 
    'nama_siswa', 
    'tempat_tanggal_lahir', 
    'alamat', 
    'kelas', 
    'jurusan'
];
}
