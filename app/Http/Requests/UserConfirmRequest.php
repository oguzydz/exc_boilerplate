<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserConfirmRequest extends FormRequest
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
            'membership_type' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'tc' => ['required', 'string'],
            'born_date' => ['required', 'date'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'city_id' => ['required', 'numeric'],
            'county_id' => ['required', 'numeric'],
            'iban' => ['required', 'string'],
            'service_text' => ['required', 'string'],
        ];
    }
}
