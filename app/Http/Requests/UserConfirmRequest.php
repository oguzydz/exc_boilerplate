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
            'membership_type'                => ['required', 'numeric'],
            'name'                           => ['required', 'string'],
            'tc'                             => ['required', 'string', "unique:users,tc,$userId"],
            'born_date'                      => ['required', 'date_format:d-m-Y'],
            'phone'                          => ['required', 'string', "unique:users,phone,$userId"],
            'address'                        => ['required', 'string'],
            'city_id'                        => ['required', 'numeric'],
            'county_id'                      => ['required', 'numeric'],
            'iban'                           => ['required', 'string'],
            'service_text'                   => ['required', 'string'],
            'title'                          => ['required', 'string', "unique:companies,title,$userId,user_id"],
            'text'                           => ['required', 'string'],
            'corporate_name'                 => ['required_if:membership_type,2,3', 'string', 'nullable'],
            'tax_office'                     => ['required_if:membership_type,2,3', 'string', 'nullable'],
            'taxpayer_identification_number' => ['required_if:membership_type,2,3', 'numeric', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'membership_type.required'                => 'Lütfen üyelik tipini giriniz.',
            'name.required'                           => 'Lütfen adınızı ve soyadınızı giriniz.',
            'tc.required'                             => 'Lütfen TC kimlik bilgilerinizi giriniz.',
            'born_date.required'                      => 'Lütfen doğum tarihinizi giriniz.',
            'phone.required'                          => 'Lütfen telefon numaranızı giriniz.',
            'address.required'                        => 'Lütfen adres bilgilerinizi giriniz.',
            'city_id.required'                        => 'Lütfen İl giriniz.',
            'county_id.required'                      => 'Lütfen İlçe giriniz.',
            'iban.required'                           => 'Lütfen iban giriniz.',
            'service_text.required'                   => 'Lütfen mağaza açıklaması giriniz.',
            'title.required'                          => 'Lütfen mağaza adı giriniz.',
            'corporate_name.required'                 => 'Lütfen şirket ismi giriniz.',
            'tax_office.required'                     => 'Lütfen vergi dairesi bilgileriniz giriniz.',
            'taxpayer_identification_number.required' => 'Lütfen vergi kimlik numaranızı giriniz.',
        ];
    }
}
