<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkOrderProcess extends Model
{
    protected $fillable = [
        'work_order_id',
        'process_id',
        'sequence',
        'standard_time',
        'remarks',
    ];

    public function workOrder(): BelongsTo
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function process(): BelongsTo
    {
        return $this->belongsTo(MasterProcess::class, 'process_id');
    }
}