<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //разрешает всем
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        //валидация постов
        return [
            'title' => 'required|min:5|max:255',
            'slug' =>  'required|min:3|max:255',
            'description' =>  'nullable',
            'type_id' =>  'required|integer',
            'content' =>  'required',
            'category_id' =>  'required|integer',
            'thumbnail' =>  'nullable|image|unique:posts',

        ];
    }
}
