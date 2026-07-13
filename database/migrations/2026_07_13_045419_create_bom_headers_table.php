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
        Schema::create('bom_headers', function (Blueprint $table) {

            $table->id();

            $table->string('bom_code')->unique();

            $table->foreignId('finished_good_item_id')
                  ->constrained('items')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('revision')->default('A');

            $table->date('effective_date')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_headers');
    }
};
