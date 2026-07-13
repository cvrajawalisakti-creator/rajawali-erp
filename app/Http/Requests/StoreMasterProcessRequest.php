<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMasterProcessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'process_name' => 'required|max:255',

            'default_unit' => 'nullable|max:50',

            'description' => 'nullable',

        ];
    }
}