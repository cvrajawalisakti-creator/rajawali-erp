<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('work_orders', function (Blueprint $table) {

            $table->timestamp('started_at')
                ->nullable()
                ->after('released_by');

            $table->foreignId('started_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->after('started_at');

        });
    }

    public function down(): void
    {
        Schema::table('work_orders', function (Blueprint $table) {

            $table->dropConstrainedForeignId('started_by');
            $table->dropColumn('started_at');

        });
    }
};