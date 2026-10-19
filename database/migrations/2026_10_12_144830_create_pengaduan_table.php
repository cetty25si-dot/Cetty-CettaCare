
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('kategori', 100);
            $table->string('lokasi', 150);
            $table->text('deskripsi');
            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Selesai',
                'Ditolak'
            ])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
