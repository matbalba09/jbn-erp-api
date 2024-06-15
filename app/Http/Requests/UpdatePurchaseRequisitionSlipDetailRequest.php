<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseRequisitionSlipDetailRequest extends FormRequest
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
            'purchase_requisition_slip_no' => 'nullable|string',
            'supplier' => 'nullable|string',
            'item' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'remarks' => 'nullable|string',
            'status' => 'nullable|string',
        ];
    }
}
