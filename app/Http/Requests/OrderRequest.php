<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id' => 'nullable|integer',
            'order_no' => 'nullable|string',
            'quotation_no' => 'nullable|string',
            'status' => 'nullable|string',
            'due_date' => 'nullable|string',
            'entry_by' => 'nullable|string',
            'entry_date' => 'nullable|string',
            'remarks' => 'nullable|string',
            'discount_price' => 'nullable|numeric',
            'total_price' => 'nullable|numeric',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
