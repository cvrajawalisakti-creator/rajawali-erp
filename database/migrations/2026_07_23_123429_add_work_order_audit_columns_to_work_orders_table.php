<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('work_orders', function (Blueprint $table) {

            $table->timestamp('released_at')
                ->nullable()
                ->after('status');

            $table->foreignId('released_by')
                ->nullable()
                ->after('released_at')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('completed_at')
                ->nullable()
                ->after('released_by');

            $table->foreignId('completed_by')
                ->nullable()
                ->after('completed_at')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('closed_at')
                ->nullable()
                ->after('completed_by');

            $table->foreignId('closed_by')
                ->nullable()
                ->after('closed_at')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('cancelled_at')
                ->nullable()
                ->after('closed_by');

            $table->foreignId('cancelled_by')
                ->nullable()
                ->after('cancelled_at')
                ->constrained('users')
                    ->nullOnDelete();

            $table->string('cancelled_reason')
                ->nullable()
                ->after('cancelled_by');
                    });
    }

    public function down(): void
    {
        Schema::table('work_orders', function (Blueprint $table) {

            $table->dropConstrainedForeignId('closed_by');
            $table->dropColumn('closed_at');

            $table->dropConstrainedForeignId('completed_by');
            $table->dropColumn('completed_at');

            $table->dropConstrainedForeignId('released_by');
            $table->dropColumn('released_at');

            $table->dropColumn('cancelled_reason');

            $table->dropConstrainedForeignId('cancelled_by');
            $table->dropColumn('cancelled_at');
        });
    }
};