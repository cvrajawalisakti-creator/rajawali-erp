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
    public const STATUS_COMPLETED = 'Completed';
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
        'released_at',
        'released_by',
        'completed_at',
        'completed_by',
        'closed_at',
        'closed_by',
        'cancelled_at',
        'cancelled_by',
        'cancelled_reason',
        'started_at',
        'started_by',
    ];

    protected function casts(): array
    {
        return [
            'wo_date'        => 'date',
            'released_at'    => 'datetime',
            'completed_at'   => 'datetime',
            'closed_at'      => 'datetime',
            'cancelled_at'   => 'datetime',
            'planned_qty'    => 'decimal:4',
            'completed_qty'  => 'decimal:4',
            'started_at'     => 'datetime',
        ];
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_RELEASED,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
            self::STATUS_CLOSED,
            self::STATUS_CANCELLED,
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

    public function releasedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'released_by');
    }

    public function completedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'completed_by');
    }

    public function closedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by');
    }

    public function cancelledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    public function startedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'started_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Business Rules
    |--------------------------------------------------------------------------
    */

    public function canBeReleased(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function canBeStarted(): bool
    {
        return $this->status === self::STATUS_RELEASED;
    }

    public function canBeCompleted(): bool
    {
        return $this->status === self::STATUS_IN_PROGRESS;
    }

    public function canBeClosed(): bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function canBeCancelled(): bool
    {
        return in_array($this->status, [
            self::STATUS_DRAFT,
            self::STATUS_RELEASED,
            self::STATUS_IN_PROGRESS,
        ], true);
    }
}