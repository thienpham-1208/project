<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:dishes,name',
            'image' => 'required|mimes:jpg,bmp,png',
            'price' => 'required|min:1',
            'category_id' => 'required|exists:categories,id',
            'discount' => 'required|min:0|max:100',
        ];
        if ($this->id) {
            $rules['name'] = 'required|unique:dishes,name,' . $this->id;
            $rules['image'] = 'mimes:jpg,bmp,png';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên món ăn chưa được nhập',
            'name.unique' => 'Tên món ăn đã được thêm',
            'image.required' => 'Chưa chọn ảnh',
            'image.mimes' => 'Tệp upload không đúng định dạng ảnh',
            'price.required' => 'Giá tiền chưa được nhập',
            'price.min' => 'Giá tiền cần lớn hơn 0',
            'category_id.required' => 'Chưa chọn thể loại',
            'category_id.exists' => 'Thể loại không hợp lệ',
            'discount.required' => 'Chưa nhập giảm giá',
            'discount.min' => 'Giảm giá không được âm',
            'discount.max' => 'Giảm giá không lớn hơn 100'
        ];
    }
}
