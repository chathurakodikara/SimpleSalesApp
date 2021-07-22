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
            'code' =>'required|unique:products,code,'.$this->product->id,
            'name' => 'required|max:190|string',
            'mrp' => 'required|numeric|max:999999.99',
            'distributor_price' => 'required|numeric|max:999999.99',
            'weight_volume' => 'required|numeric|max:999999.99',
            'unit' => 'required|in:nos,Kg,l',
        ];
    }
}
