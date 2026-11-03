<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'judul',
        'kategori',
        'kategori_id',
        'mahasiswa_id',
        'lokasi',
        'deskripsi',
        'status',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function kategoriData(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tanggapan(): HasMany
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}
