<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'image' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name_product.required' => 'harus diisi!'
    //     ];
    // }
}
