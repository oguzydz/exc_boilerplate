<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'title'     => ['required', 'string'],
            'text'      => ['required', 'string'],
            'order'     => ['required', 'numeric'],
            'new_image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }

    public function messages()
    {
        return [
            'image.required'  => 'Lütfen kategori başlığı giriniz',
            'text.required'   => 'Lütfen kategori açıklaması giriniz.',
            'order.required'  => 'Lütfen kategori sırası giriniz.',
            'new_image.mimes' => 'Lütfen resmi jpeg, png, jpg, gif,svg formatında giriniz.',
        ];
    }
}
