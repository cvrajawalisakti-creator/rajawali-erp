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
            'item_name'      => 'required|max:255',
            'alias'          => 'nullable|max:255',
            'item_type'      => 'required',
            'category'       => 'nullable|max:255',
            'material_type'  => 'nullable|max:255',
            'unit'           => 'required|max:50',
            'is_active'      => 'nullable|boolean',
        ];
    }
}