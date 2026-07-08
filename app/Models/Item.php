<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [

        'item_code',
        'item_name',
        'alias',

        'item_type',
        'category',
        'material_type',
        'unit',

        'drawing_number',
        'revision',
        'customer_part_number',

        'minimum_stock',
        'reorder_level',
        'lead_time',

        'standard_cost',
        'last_purchase_price',

        'remarks',

        'is_active',
    ];
}