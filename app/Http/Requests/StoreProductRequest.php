<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'QTY' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'description' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ];
    }
}
