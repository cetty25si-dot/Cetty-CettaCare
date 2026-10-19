<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('mahasiswa')) {
            Schema::create('mahasiswa', function (Blueprint $table) {
                $table->id();
                $table->string('nim', 20)->unique();
                $table->string('nama', 100);
                $table->string('email', 100)->unique();
                $table->string('program_studi', 100);
                $table->timestamps();
            });
        } else {
            Schema::table('mahasiswa', function (Blueprint $table) {
                if (!Schema::hasColumn('mahasiswa', 'nim')) {
                    $table->string('nim', 20)->unique();
                }

                if (!Schema::hasColumn('mahasiswa', 'nama')) {
                    $table->string('nama', 100);
                }

                if (!Schema::hasColumn('mahasiswa', 'email')) {
                    $table->string('email', 100)->unique();
                }

                if (!Schema::hasColumn('mahasiswa', 'program_studi')) {
                    $table->string('program_studi', 100);
                }
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
