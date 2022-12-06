<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class storeInventoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string|max:70",
            "quantity"=>"required|integer|digits_between:1,7",
            "price"=>"required|integer|digits_between:1,7",
            "category"=>"required|string"
        ];
    }

    public function failedValidation(Validator $validator)

    {

        return response()->json([

            'success'   => false,
            'message'   => 'Inputs are not Valid',
            'data'      => $validator->errors()

        ]);

    }

    public function messages()

    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name should be a string',
            'name.max' => 'Name cannot be longer than 70 characters',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity should be a number',
            'quantity.digits_between' => 'Quantity cannot be 0 or greater than 7 characters',
            'price.required' => 'Price is required',
            'price.integer' => 'Price should be a number',
            'price.digits_between' => 'Price cannot be 0 or greater than 7 characters',
            'category.required' => 'Category is required',
            'category.string' => 'Category should be a string',
        ];

    }
}
