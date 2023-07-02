<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
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
        //валидация постов
        return [
            'order' => 'nullable',
            'company' => 'required|min:3|max:255',
//            регулярное выражение для телефона
            'phone' => 'required|min:9|max:30|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fio' => 'required|min:3|max:255',
            'main-text' => 'required|min:3|max:255',
        ];
    }
}
