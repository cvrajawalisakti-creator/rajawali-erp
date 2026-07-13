<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BomProcess;

class MasterProcess extends Model
{
    protected $fillable = [

        'process_code',

        'process_name',

        'default_unit',

        'description',

        'is_active',

    ];

    protected function casts(): array
    {
        return [

            'is_active' => 'boolean',

        ];
    }

    public function bomProcesses(): HasMany
    {
        return $this->hasMany(BomProcess::class, 'process_id');
    }
}