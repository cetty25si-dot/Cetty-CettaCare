<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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

    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            if (Schema::hasColumn('mahasiswa', 'nim')) {
                $table->dropUnique(['nim']);
                $table->dropColumn('nim');
            }

            if (Schema::hasColumn('mahasiswa', 'email')) {
                $table->dropUnique(['email']);
                $table->dropColumn('email');
            }

            foreach (['nama', 'program_studi'] as $column) {
                if (Schema::hasColumn('mahasiswa', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
