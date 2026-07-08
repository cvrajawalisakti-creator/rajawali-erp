<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_code',
        'supplier_name',
        'contact_person',
        'phone',
        'email',
        'address',
        'npwp',
        'bank_name',
        'account_number',
        'account_holder',
        'payment_term',
        'is_active',
    ];
}