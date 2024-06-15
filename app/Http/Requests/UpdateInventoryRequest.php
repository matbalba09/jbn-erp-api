<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'stock_no' => 'nullable|string',
            'item_code' => 'nullable|string',
            'item_name' => 'nullable|string',
            'reorder_level' => 'nullable|string',
            'qty_on_hand' => 'nullable|integer',
            'item_type' => 'nullable|string',
            'uom' => 'nullable|string',
            'remarks' => 'nullable|string',
        ];
    }
}
