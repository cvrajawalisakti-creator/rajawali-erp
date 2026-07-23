<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_order_processes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('work_order_id')
                ->constrained('work_orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('process_id')
                ->constrained('master_processes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->integer('sequence');

            $table->decimal('standard_time', 10, 2)
                ->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index('sequence');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_processes');
    }
};
