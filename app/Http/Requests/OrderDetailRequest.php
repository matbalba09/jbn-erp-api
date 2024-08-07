<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
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
            'order_no' => 'nullable|string',
            'product_id' => 'nullable|integer',
            'uom' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'total_price' => 'nullable|numeric',
            'remarks' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
