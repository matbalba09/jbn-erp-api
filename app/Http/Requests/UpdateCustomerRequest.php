<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'company' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'contact_no' => 'nullable|string',
            'status' => 'nullable|string',
            'entry_by' => 'nullable|string',
            'entry_date' => 'nullable|string',
            'remarks' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
