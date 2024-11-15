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
            'item_name' => 'nullable|string',
            'maker' => 'nullable|string',
            'material' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'print' => 'nullable|string',
            'print_size' => 'nullable|string',
            'design_url' => 'nullable|string',
            'remarks' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'selling_price' => 'nullable|numeric',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
