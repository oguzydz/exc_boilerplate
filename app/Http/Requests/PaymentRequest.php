<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cardNumber'       => ['required', new CardNumber],
            'cardExpires'      => ['required'],
            'cardSecurityCode' => ['required', new CardCvc(preg_replace('/\s+/', '', $this->cardNumber))]
        ];
    }

    public function messages()
    {
        return [
            'cardNumber.required' => 'Lütfen kart bilgisi giriniz.',
        ];
    }
}
