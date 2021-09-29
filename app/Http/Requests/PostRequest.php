<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'=>'required|max:20',
            'product_content'=>'required',

        ];
    }

    public function messages()
{
    return [
        'name.required' => '商品名は必須です。',
    'name.max'      => '商品名は20文字以内で記入してください。',
        'product_content.required'  => '内容は必須です。',
    ];
}
}
