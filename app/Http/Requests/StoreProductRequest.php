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
            'name'=>'required|string|max:255',
            'QTY'=>'required|integer',
            'price'=>'required|integer',
            'image'=>'nullable|mimes:png,jpg,jpeg|max:2048',
            'description'=>'nullable|string',
        ];
    }
}
