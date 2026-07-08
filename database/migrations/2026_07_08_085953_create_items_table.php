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
        Schema::create('items', function (Blueprint $table) {

            $table->id();

            // Basic Information
            $table->string('item_code')->unique();
            $table->string('item_name');
            $table->string('alias')->nullable();

            // Item Classification
            $table->enum('item_type', [
                'Finished Good',
                'Semi Finished',
                'Raw Material',
                'Component',
                'Purchased Part',
                'Consumable',
                'Tool',
                'Service',
                'Customer Material',
            ]);

            // Master Data
            $table->string('category')->nullable();
            $table->string('material_type')->nullable();
            $table->string('unit');

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
