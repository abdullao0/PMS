<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'string|sometimes',
            'numberOfEmployees'=>'integer|sometimes',
            'logo'=>'string|nullable',
            'description'=>'string|nullable',
        ];
    }
}
