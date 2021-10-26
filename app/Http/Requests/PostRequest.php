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
            'name'=>'required|max:100',
            'product_content'=>'required|max:500',
            'product_category'=>'numeric|required|between:1,5',
            'product_subcategory'=>'numeric|required|between:1,25',
            
        ];
    }

    public function messages()
{
    return [
        'name.required' => '商品名は必須です。',
    'name.max'      => '商品名は100文字以内で記入してください。',
    'product_content.max'      => '内容は500文字以内で記入してください。',
        'product_content.required'  => '内容は必須です。',
        
        
    ];
}
}
