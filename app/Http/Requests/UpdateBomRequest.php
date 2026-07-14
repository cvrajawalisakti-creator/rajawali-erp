<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'finished_good_item_id' => [
                'required',
                'exists:items,id',
            ],

            'revision' => [
                'required',
                'max:20',
            ],

            'effective_date' => [
                'nullable',
                'date',
            ],

            'description' => [
                'nullable',
            ],

            'materials' => [
                'required',
                'array',
                'min:1',
            ],

            'materials.*.component_item_id' => [
                'required',
                'exists:items,id',
            ],

            'materials.*.usage_type' => [
                'required',
                'in:Material,Consumable',
            ],

            'materials.*.qty' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'materials.*.yield_percent' => [
                'required',
                'numeric',
                'between:0,100',
            ],

            'processes' => [
                'required',
                'array',
                'min:1',
            ],

            'processes.*.process_id' => [
                'required',
                'exists:master_processes,id',
            ],

            'processes.*.parameter_value' => [
                'nullable',
                'numeric',
            ],

            'processes.*.parameter_unit' => [
                'nullable',
                'max:50',
            ],

        ];
    }
}