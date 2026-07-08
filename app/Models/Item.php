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
        'is_active',
    ];
}