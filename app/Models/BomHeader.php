<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\BomDetail;
use App\Models\BomProcess;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BomHeader extends Model
{
    protected $fillable = [

        'bom_code',
        'finished_good_item_id',
        'revision',
        'effective_date',
        'description',
        'is_active',

    ];

    protected function casts(): array
    {
        return [
            'effective_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function finishedGood(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'finished_good_item_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(BomDetail::class);
    }

    public function processes(): HasMany
    {
        return $this->hasMany(BomProcess::class);
    }
}