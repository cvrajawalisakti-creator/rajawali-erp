<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'wo_date' => ['required', 'date'],

            'finished_good_item_id' => [
                'required',
                'exists:items,id',
            ],

            'planned_qty' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'planned_start' => [
                'nullable',
                'date',
            ],

            'planned_finish' => [
                'nullable',
                'date',
                'after_or_equal:planned_start',
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }
}