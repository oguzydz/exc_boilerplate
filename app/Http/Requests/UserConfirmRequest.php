<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::user()->id;

        return [
            'membership_type' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'tc' => ['required', 'string', "unique:users,tc,$userId"],
            'born_date' => ['required', 'date'],
            'phone' => ['required', 'string', "unique:users,phone,$userId"],
            'address' => ['required', 'string'],
            'city_id' => ['required', 'numeric'],
            'county_id' => ['required', 'numeric'],
            'iban' => ['required', 'string'],
            'service_text' => ['required', 'string'],
            'title' => ['required', 'string', "unique:companies,title,$userId,user_id"],
            'text' => ['required', 'string'],
        ];
    }
}
