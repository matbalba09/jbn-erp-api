<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintTypeRequest extends FormRequest
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
            'print' => 'nullable|string',
            'material' => 'nullable|string',
            'size' => 'nullable|string',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'remarks' => 'nullable|string',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
