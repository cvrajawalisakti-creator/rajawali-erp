<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkOrder extends Model
{
    public const STATUS_DRAFT = 'Draft';
    public const STATUS_RELEASED = 'Released';
    public const STATUS_IN_PROGRESS = 'In Progress';
    public const STATUS_FINISHED = 'Finished';
    public const STATUS_CLOSED = 'Closed';
    public const STATUS_CANCELLED = 'Cancelled';

    protected $fillable = [
        'wo_number',
        'wo_date',
        'finished_good_item_id',
        'bom_header_id',
        'planned_qty',
        'completed_qty',
        'planned_start',
        'planned_finish',
        'status',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'wo_date' => 'date',
            'planned_start' => 'date',
            'planned_finish' => 'date',

            'planned_qty' => 'decimal:4',
            'completed_qty' => 'decimal:4',
        ];
    }

    public function finishedGood(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'finished_good_item_id');
    }

    public function bomHeader(): BelongsTo
    {
        return $this->belongsTo(BomHeader::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(WorkOrderMaterial::class);
    }

    public function processes(): HasMany
    {
        return $this->hasMany(WorkOrderProcess::class);
    }
}