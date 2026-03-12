<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Konseling extends Model
{
    protected $table = 'konseling';
    protected $primaryKey = 'id_konseling';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_konseling', 'id_guru_bk', 'id_siswa', 'tanggal', 
        'jenis_konseling', 'catatan_konseling', 'status'
    ];

    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id_konseling)) {
                $model->id_konseling = (string) Str::uuid();
            }
        });
    }

    public function guru() { return $this->belongsTo(Guru::class, 'id_guru_bk', 'id_guru_bk'); }
}