<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
            'name' => 'required',
            'photo' => 'required',
            'content' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tiêu đề bài viết',
            'photo.required' => 'Ảnh bài viết không được trống',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'description.required' => 'Vui lòng nhập tóm tắt bài viết'
        ];
    }
}
