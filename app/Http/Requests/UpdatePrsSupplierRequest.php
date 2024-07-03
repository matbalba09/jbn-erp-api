<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrsSupplierRequest extends FormRequest
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
            'bom_id' => 'nullable|integer',
            'supplier_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'uom' => 'nullable|string',
            'price' => 'nullable|numeric',
            'prs_supplier_type_id' => 'nullable|integer',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
