<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruBKS extends Model 
{
    protected $table = 'guru_bk';
    protected $primaryKey = 'id_guru_bk';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $fillable = [
        'id_guru_bk', 
        'id_user', 
        'nip', 
        'nama_guru_bk', 
        'jk', 
        'no_tlp'
    ];
}