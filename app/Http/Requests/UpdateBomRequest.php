<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBomRequest extends FormRequest
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
            'product_id' => 'nullable|integer',
            'component_id' => 'nullable|integer',
            'unit_cost' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'uom' => 'nullable|string',
            'bom_type_id ' => 'nullable|integer',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
