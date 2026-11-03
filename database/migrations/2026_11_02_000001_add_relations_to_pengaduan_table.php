<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            if (! Schema::hasColumn('pengaduan', 'kategori_id')) {
                $table->foreignId('kategori_id')->nullable()->constrained('kategori')->nullOnDelete();
            }

            if (! Schema::hasColumn('pengaduan', 'mahasiswa_id')) {
                $table->foreignId('mahasiswa_id')->nullable()->constrained('mahasiswa')->nullOnDelete();
            }
        });

        $pengaduanLama = DB::table('pengaduan')->whereNull('kategori_id')->get(['id', 'kategori']);

        foreach ($pengaduanLama as $item) {
            $kategori = DB::table('kategori')->where('nama_kategori', $item->kategori)->first();

            if ($kategori !== null) {
                DB::table('pengaduan')->where('id', $item->id)->update(['kategori_id' => $kategori->id]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduan', 'mahasiswa_id')) {
                $table->dropConstrainedForeignId('mahasiswa_id');
            }

            if (Schema::hasColumn('pengaduan', 'kategori_id')) {
                $table->dropConstrainedForeignId('kategori_id');
            }
        });
    }
};
