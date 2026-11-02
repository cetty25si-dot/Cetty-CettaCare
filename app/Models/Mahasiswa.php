<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'program_studi',
    ];

    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'mahasiswa_id');
    }
}
