<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoRequest extends FormRequest
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
            'jo_no' => 'nullable|integer',
            'po_no' => 'nullable|integer',
            'so_no' => 'nullable|integer',
            'shipment_date' => 'nullable|string',
            'business_operation' => 'nullable|string',
            'oic' => 'nullable|string',
            'status' => 'nullable|string',
            'production_date' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
