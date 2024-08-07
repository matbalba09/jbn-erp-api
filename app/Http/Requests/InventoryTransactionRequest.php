<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryTransactionRequest extends FormRequest
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
            'inventory_id' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'image' => 'nullable|array',
            'image.*' => 'file',
            'flow' => 'nullable|string',
            'remarks' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*' => 'file',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
