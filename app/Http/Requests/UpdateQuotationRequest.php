<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuotationRequest extends FormRequest
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
            'quotation_date' => 'nullable|string',
            'valid_until' => 'nullable|string',
            'total_price' => 'nullable|numeric',
            'requested_by' => 'nullable|integer',
            'approved_by' => 'nullable|integer',
            'received_by' => 'nullable|string',
            'remarks' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
