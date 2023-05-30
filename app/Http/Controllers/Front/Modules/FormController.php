<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Front\Form;

class FormController extends Controller
{
    public function formFront(Form $request) {

        $data = $request->input();
//        dump($data);

        return redirect('/#zakaz')->with('success', 'Форма отправлена');

    }
}
