<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePurchaseOrderRequest extends FormRequest
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
            'purchase_requisition_slip_detail_id' => 'nullable|integer',
            'supplier' => 'nullable|string',
            'description' => 'nullable|string',
            'purchase_order_date' => 'nullable|string',
            'remarks' => 'nullable|string',
        ];
    }
}
