<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
        $rules['name'] = 'required|unique:categories,name';
        if ($this->id) {
            $rules['name'] = 'required|unique:categories,name,' . $this->id;
            $rules['slug'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên thể loại món ăn',
            'name.unique' => 'Tên thể loại món ăn đã được thêm',
            'slug.required' => 'Slug chưa được nhập'
        ];
    }
}
