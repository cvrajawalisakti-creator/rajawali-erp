<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            // =========================
            // BOM HEADER
            // =========================

            'finished_good_item_id' => [
                'required',
                'exists:items,id',
            ],

            'revision' => [
                'required',
                'string',
                'max:20',
            ],

            'effective_date' => [
                'required',
                'date',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            // =========================
            // MATERIALS
            // =========================

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

            'materials.*.remarks' => [
                'nullable',
                'string',
            ],

            // =========================
            // PROCESSES
            // =========================

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
                'gte:0',
            ],

            'processes.*.parameter_unit' => [
                'nullable',
                'string',
                'max:30',
            ],

            'processes.*.remarks' => [
                'nullable',
                'string',
            ],

        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [

            'finished_good_item_id.required' => 'Finished Good must be selected.',

            'materials.required' => 'At least one material is required.',
            'materials.min' => 'At least one material is required.',

            'processes.required' => 'At least one production process is required.',
            'processes.min' => 'At least one production process is required.',

            'materials.*.qty.gt' => 'Material quantity must be greater than zero.',

            'materials.*.yield_percent.between' =>
                'Yield must be between 0 and 100%.',

        ];
    }
}