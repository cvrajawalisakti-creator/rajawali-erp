<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name'  => 'required|max:255',
            'contact_person' => 'nullable|max:255',
            'phone'          => 'nullable|max:100',
            'email'          => 'nullable|email|max:255',
            'address'        => 'nullable',
            'npwp'           => 'nullable|max:100',
            'is_active'      => 'nullable|boolean',
        ];
    }
}