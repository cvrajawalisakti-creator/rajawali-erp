<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BomHeader;
use App\Models\Item;

class BomDetail extends Model
{
    protected $fillable = [

        'bom_header_id',

        'component_item_id',

        'usage_type',

        'qty',

        'yield_percent',

        'sequence',

        'remarks',

    ];

    protected function casts(): array
    {
        return [

            'qty' => 'decimal:4',

            'yield_percent' => 'decimal:2',

        ];
    }

    public function bomHeader(): BelongsTo
    {
        return $this->belongsTo(BomHeader::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'component_item_id');
    }
}