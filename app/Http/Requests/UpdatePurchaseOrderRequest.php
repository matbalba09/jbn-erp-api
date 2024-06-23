<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOrderRequest extends FormRequest
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
            'po_no' => 'nullable|string',
            'prs_id' => 'nullable|integer',
            'order_no' => 'nullable|string',
            'supplier_id' => 'nullable|integer',
            'status' => 'nullable|string',
            'po_date' => 'nullable|string',
            'remarks' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
