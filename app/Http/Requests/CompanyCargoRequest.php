<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCargoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price'            => ['required', 'numeric'],
            'after_free_price' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'price.required'             => 'Lütfen kargo ücreti giriniz.',
            'after_free_price.required'  => 'Lütfen ücretsiz gönderim ücreti giriniz.',
        ];
    }
}
