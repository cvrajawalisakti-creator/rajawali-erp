<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE items
            MODIFY item_type ENUM(
                'Finished Good',
                'Semi Finished',
                'Raw Material',
                'Component',
                'Purchased Part',
                'Consumable',
                'Tool',
                'Service',
                'Customer Material'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE items
            MODIFY item_type ENUM(
                'Finished Good',
                'Semi Finished',
                'Raw Material',
                'Component',
                'Purchased Part',
                'Service',
                'Customer Material'
            ) NOT NULL
        ");
    }
};