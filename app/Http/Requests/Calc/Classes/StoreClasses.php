<?php

namespace App\Http\Requests\Calc\Classes;

use Illuminate\Foundation\Http\FormRequest;

class StoreClasses extends FormRequest
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
            'title' => 'required|unique:calc_classes|min:2|max:255',
        ];
    }
}
