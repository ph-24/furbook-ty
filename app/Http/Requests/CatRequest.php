<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            'name'=>'required|max:255',
            'date_of_birth'=>'required|date_format:"Y-m-d"',
            'breed_id'=>'numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Cột :attribute là bắt buộc.',
            'size' => 'Cột :attribute độ dài phải nhỏ hơn :size .',
            'date_format' => 'Cột :attribute phai là kiểu Y-m-d.',
            'numeric' => 'Cột :attribute phải là số.',
        ];
    }
}
