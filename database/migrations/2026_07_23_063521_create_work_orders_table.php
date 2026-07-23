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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();

            $table->string('wo_number')->unique();
            $table->date('wo_date');

            $table->foreignId('finished_good_item_id')
                ->constrained('items')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('bom_header_id')
                ->constrained('bom_headers')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('planned_qty', 18, 4);

            $table->decimal('completed_qty', 18, 4)
                ->default(0);

            $table->date('planned_start')->nullable();
            $table->date('planned_finish')->nullable();

            $table->string('status')
                ->default('Draft');

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index('wo_number');
            $table->index('status');
            $table->index('wo_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
