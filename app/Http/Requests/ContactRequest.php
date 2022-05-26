<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255'],
            'text'    => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Lütfen ad-soyad giriniz.',
            'email.required'   => 'Lütfen mail adresinizi giriniz.',
            'text.required'    => 'Lütfen konu başlığı giriniz.',
            'message.required' => 'Lütfen mesajınızı  giriniz.',
        ];
    }
}
