<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'category_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'discount_price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'delivery_time' => ['required', 'numeric'],
            'order' => ['required', 'numeric'],
        ];
    }
}
