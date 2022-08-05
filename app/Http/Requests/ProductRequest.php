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
            'product_name' => 'required',
            'price' => 'required|min:0|not_in:0',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Please input product name',
            'price.required' => 'Please input price',
            'description.required' => 'Please input description',
        ];
    }
}
