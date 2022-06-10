<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionRequest extends FormRequest
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
            'price'                   => ['required', 'numeric'],
            'finish_price'            => ['required', 'numeric'],
            'percent'                 => ['required', 'numeric'],
            'local_processing_fee'    => ['required', 'numeric'],
            'foreign_proccessing_fee' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return[
            'price.required'                   => 'Lütfen aylık satış ücreti giriniz.',
            'finish_percent.required'          => 'Lütfen en yüksek aylık satış ücreti giriniz.',
            'percent.required'                 => 'Lütfen yüzdelik dilim ücreti giriniz.',
            'local_processing_fee.required'    => 'Lütfen işlem ücreti giriniz.',
            'foreign_proccessing_fee.required' => 'Lütfen yurt dışı işlem ücreti giriniz.'
        ];
    }
}
