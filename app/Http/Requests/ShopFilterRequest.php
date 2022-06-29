<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopFilterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search'    => ['nullable', 'string'],
            'minAmount' => ['nullable', 'numeric'],
            'maxAmount' => ['nullable', 'numeric'],
        ];
    }
}
