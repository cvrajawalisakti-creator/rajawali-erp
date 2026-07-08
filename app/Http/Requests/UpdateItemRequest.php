<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'item_name'             => 'required|max:255',
            'alias'                 => 'nullable|max:255',

            'item_type'             => 'required',
            'category'              => 'nullable|max:255',
            'material_type'         => 'nullable|max:255',
            'unit'                  => 'required|max:50',

            'drawing_number'        => 'nullable|max:255',
            'revision'              => 'nullable|max:50',
            'customer_part_number'  => 'nullable|max:255',

            'minimum_stock'         => 'nullable|numeric',
            'reorder_level'         => 'nullable|numeric',
            'lead_time'             => 'nullable|integer',

            'standard_cost'         => 'nullable|numeric',
            'last_purchase_price'   => 'nullable|numeric',

            'remarks'               => 'nullable',

        ];
    }
}