<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'company_id' => ['required', 'numeric'],
            'email'      => ['required', 'string', 'email', 'max:255'],
            'text'       => ['required', 'string', 'max:255'],
            'message'    => ['required', 'string', 'max:255'],
        ];
    }
}
