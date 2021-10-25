<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'body'=>'required|max:500',
            
            'evaluation'=>'numeric|required|between:1,5',
            
        ];
    }
    public function messages()
{
    return [
        'body.required' => '商品コメントは必須です',
    'body.max'      => '商品コメントは500文字以内で記入してください。',
    'evaluation.required'      => '商品評価は必須です',
        'evaluation.between'  => '選択肢から選んでください',
        'evaluation.numeric'  => '商品評価は選択肢から選んでください',
        
        
    ];
}
}
