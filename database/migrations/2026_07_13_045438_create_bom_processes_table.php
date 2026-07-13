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
        Schema::create('bom_processes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('bom_header_id')
                  ->constrained('bom_headers')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('process_id')
                  ->constrained('master_processes')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->unsignedInteger('sequence')->default(10);

            $table->index('sequence');

            $table->decimal('parameter_value', 18, 4)->nullable();

            $table->string('parameter_unit')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_processes');
    }
};
