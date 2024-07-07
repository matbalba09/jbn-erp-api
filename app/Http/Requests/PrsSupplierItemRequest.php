<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrsSupplierItemRequest extends FormRequest
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
            'prs_supplier_id' => 'nullable|integer',
            'bom_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'uom' => 'nullable|string',
            'price' => 'nullable|numeric',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
