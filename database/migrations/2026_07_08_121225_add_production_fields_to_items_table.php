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
        Schema::table('items', function (Blueprint $table) {

            // Engineering
            $table->string('drawing_number')->nullable()->after('material_type');
            $table->string('revision',20)->nullable()->after('drawing_number');
            $table->string('customer_part_number')->nullable()->after('revision');

            // Inventory
            $table->decimal('minimum_stock',12,2)->default(0)->after('unit');
            $table->decimal('reorder_level',12,2)->default(0)->after('minimum_stock');
            $table->integer('lead_time')->default(0)->after('reorder_level');

            // Costing
            $table->decimal('standard_cost',18,2)->default(0)->after('lead_time');
            $table->decimal('last_purchase_price',18,2)->default(0)->after('standard_cost');

            // Notes
            $table->text('remarks')->nullable()->after('last_purchase_price');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {

            $table->dropColumn([
                'drawing_number',
                'revision',
                'customer_part_number',
                'minimum_stock',
                'reorder_level',
                'lead_time',
                'standard_cost',
                'last_purchase_price',
                'remarks',
            ]);

        });
    }
};
