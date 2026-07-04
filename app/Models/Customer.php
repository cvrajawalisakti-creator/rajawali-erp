<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_code',
        'customer_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'npwp',
        'is_active',
    ];
}