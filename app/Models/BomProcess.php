<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BomHeader;
use App\Models\MasterProcess;

class BomProcess extends Model
{
    protected $fillable = [

        'bom_header_id',

        'process_id',

        'sequence',

        'parameter_value',

        'parameter_unit',

        'remarks',

    ];

    protected function casts(): array
    {
        return [

            'parameter_value' => 'decimal:4',

        ];
    }

    public function bomHeader(): BelongsTo
    {
        return $this->belongsTo(BomHeader::class);
    }

    public function process(): BelongsTo
    {
        return $this->belongsTo(MasterProcess::class, 'process_id');
    }
}