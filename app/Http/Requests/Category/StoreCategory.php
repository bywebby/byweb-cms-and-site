<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'title' => 'required|unique:categories|min:10|max:255',
            'slug' =>  'required|unique:categories|min:10|max:255',
            'meta_title' => 'required|min:10|max:255',
            'meta_desc' => 'required|min:10|max:255',
        ];
    }
}
