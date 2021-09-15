<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
            'name' => 'required|unique:tables,name,0,id,deleted_at,NULL',
            'number' => 'required|numeric|min:1'
        ];
        if ($this->id) {
            $rules['name'] = 'required|unique:tables,name,' . $this->id . ',id,deleted_at,NULL';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên bàn',
            'name.unique' => 'Tên bàn đã được thêm',
            'number.required' => 'Chưa nhập số lượng người',
            'number.min' => 'Số lượng người không nhỏ hơn 1'
        ];
    }
}
