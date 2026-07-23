<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkOrderMaterial extends Model
{
    protected $fillable = [
        'work_order_id',
        'item_id',
        'sequence',
        'required_qty',
        'issued_qty',
        'unit',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'required_qty' => 'decimal:4',
            'issued_qty' => 'decimal:4',
        ];
    }

    public function workOrder(): BelongsTo
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}