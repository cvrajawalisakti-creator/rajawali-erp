<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'company_short_name',
        'address',
        'phone',
        'email',
        'website',
        'npwp',
        'nib',
        'director_name',
        'tax_name',
        'logo_horizontal',
        'logo_square',
        'is_active',
    ];
}