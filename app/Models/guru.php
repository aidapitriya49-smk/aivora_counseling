<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruBKS extends Model
{
   protected $table = 'guru_bk';

    protected $fillable = [
    'id_guru_bk', 
    'id_user', 
    'nip', 
    'nama_guru_bk', // Sesuaikan dengan nama di migration
    'jk', 
    'no_tlp'
];
}