<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductLaborCostRequest extends FormRequest
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
            'labor_cost_id' => 'nullable|integer',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
