<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderResultRequest extends FormRequest
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
            'cargo_company_id' => 'exclude_if:type,0|required|numeric',
            'shipping_no'      => 'exclude_if:type,0|required|string',
            'note'             => ['required', 'string'],
        ];
    }
}
