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
            'name'=>'sometimes|string|max:255',
            'QTY'=>'sometimes|integer',
            'image'=>'sometimes|mimes:png,jpg,jpeg|max:2048',
            'description'=>'sometimes|string',
        ];
    }
}
