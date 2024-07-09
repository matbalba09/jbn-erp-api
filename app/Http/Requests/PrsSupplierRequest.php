<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrsSupplierRequest extends FormRequest
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
            'prs_detail_id' => 'nullable|integer',
            'supplier_id' => 'nullable|integer',
            'name' => 'nullable|string',
            'uom' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
