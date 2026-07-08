<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'supplier_name'  => 'required|max:255',
            'contact_person' => 'nullable|max:255',
            'phone'          => 'nullable|max:100',
            'email'          => 'nullable|email|max:255',
            'address'        => 'nullable',
            'npwp'           => 'nullable|max:100',
            'bank_name'      => 'nullable|max:255',
            'account_number' => 'nullable|max:100',
            'account_holder' => 'nullable|max:255',
            'payment_term'   => 'required|max:50',
            'is_active'      => 'nullable|boolean',
        ];
    }
}