<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'issued_date' => 'nullable|string',
            'ref_no' => 'nullable|string',
            'paid_date' => 'nullable|string',
            'payment_method' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'documents' => 'nullable|string',
            'status' => 'nullable|string',
            'check_no' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'verified' => 'nullable|integer',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
