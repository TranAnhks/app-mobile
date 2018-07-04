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
            'name' => 'required|unique:products,name,'.$this->products.'|max:255',
            'packet' => 'required|max:255',
            'promo' => 'required|max:255',
            'price' => 'required|max:255',
            'images' => 'required|image',
     
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được trống',
            'name.unique' => 'Tên sản phẩm tồn tại',

            'packet.required' => 'Gồm có không được trống',
            'promo.required' => 'Khuyến mãi không được trống',
            'price.required' => 'Giá không được trống',
            'images.required' => 'Hình ảnh không được trống',
            'images.image' => 'Hình ảnh không hợp lệ',


         

        ];
    }
}
