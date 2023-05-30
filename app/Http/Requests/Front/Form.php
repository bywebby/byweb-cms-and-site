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
            'company' => 'required|min:5|max:255',
//            регулярное выражение для телефона
            'phone' => 'required|min:10|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fio' => 'required|min:5|max:255',
            'main-text' => 'required|min:5|max:255',
        ];
    }
}
