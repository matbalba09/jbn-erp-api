<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrsRequest extends FormRequest
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
            'prs_no' => 'nullable|string',
            'prs_date' => 'nullable|string',
            'customer_id' => 'nullable|integer',
            'requested_by' => 'nullable|integer',
            'approved_by' => 'nullable|integer',
            'remarks' => 'nullable|string',
            'status' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
