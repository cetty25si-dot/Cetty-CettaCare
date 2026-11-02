<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->constrained('pengaduan')->cascadeOnDelete();
            $table->string('nama_admin', 100);
            $table->text('isi_tanggapan');
            $table->timestamps();

            $table->index('pengaduan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tanggapan');
    }
};
