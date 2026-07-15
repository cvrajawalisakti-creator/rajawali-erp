<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bom_headers', function (Blueprint $table) {

            // Hapus unique lama
            $table->dropUnique(['bom_code']);

        });

        Schema::table('bom_headers', function (Blueprint $table) {

            // Tambahkan unique baru
            $table->unique([
                'bom_code',
                'revision',
            ]);

        });
    }

    public function down(): void
    {
        Schema::table('bom_headers', function (Blueprint $table) {

            $table->dropUnique([
                'bom_code',
                'revision',
            ]);

        });

        Schema::table('bom_headers', function (Blueprint $table) {

            $table->unique('bom_code');

        });
    }
};