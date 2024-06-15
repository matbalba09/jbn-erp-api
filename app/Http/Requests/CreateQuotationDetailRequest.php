<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuotationDetailRequest extends FormRequest
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
            'quotation_no' => 'nullable|string',
            'product_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'total_price' => 'nullable|numeric',
        ];
    }
}
