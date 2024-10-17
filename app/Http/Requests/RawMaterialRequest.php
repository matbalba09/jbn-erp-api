<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RawMaterialRequest extends FormRequest
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
            'raw_material' => 'nullable|string',
            'material' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'price' => 'nullable|numeric',
            'is_deleted' => 'nullable|integer',
        ];
    }
}
