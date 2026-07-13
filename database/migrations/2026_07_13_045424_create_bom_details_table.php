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
        Schema::create('bom_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('bom_header_id')
                  ->constrained('bom_headers')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('component_item_id')
                  ->constrained('items')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->enum('usage_type', [
                  'Material',
                  'Consumable',
            ])->default('Material');

            $table->index('usage_type');

            $table->decimal('qty', 18, 4);

            $table->decimal('yield_percent',5,2)->default(100);

            $table->unsignedInteger('sequence')->default(10);

            $table->text('remarks')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_details');
    }
};
