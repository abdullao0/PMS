<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'string|required',
            'numberOfEmployees'=>'integer|required',
            'logo'=>'string|nullable',
            'description'=>'string|nullable',
        ];

    }
}
