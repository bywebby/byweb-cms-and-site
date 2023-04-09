<?php

namespace App\Http\Requests\Calc\Module;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleCalc extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'category_id' => 'required|integer|min:0'
        ];
    }
}
