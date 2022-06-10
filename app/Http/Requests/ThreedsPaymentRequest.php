<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreedsPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status'           => ['required', 'string'],
            'paymentId'        => ['required', 'string'],
            'mdStatus'         => ['required', 'string'],
            'conversationData' => ['string'],
            'conversationId'   => ['string'],
        ];
    }
}
