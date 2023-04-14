<?php

namespace App\Http\Requests\Calc;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'calc_title_id' => 'required|integer|min:1',
            'price' => 'required|numeric|between:0,99999999.99',
            'calc_module_id' => 'required|integer|min:1',
            'calc_category_id' => 'required|integer|min:1',
        ];
    }
}
