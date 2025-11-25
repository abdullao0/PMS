<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'QTY' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string',
            'categories' => 'sometimes|array',
            'categories.*' => 'exists:categories,id'
        ];
    }
}
