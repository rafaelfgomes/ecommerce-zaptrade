<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product-name' => 'required|string',
            'product-price' => 'required',
            'product-description' => 'required|string',
            'category-id' => 'required|integer',
            'product-images.*' => 'required|image|mimes:jpeg,jpg,bmp,png,webp'
        ];
    }
}
