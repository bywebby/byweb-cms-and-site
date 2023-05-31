<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Front\Form;

class FormController extends Controller
{

    public $status = false;


    public function formFront(Form $request) {

//        данные формы
        $data = $request->input();

//statusForm - ключ в сессии, который сигнализирует об успешной отправки формы
        return redirect()->back()->with(['success' => 'Ваш запрос отправлен!', 'statusForm' => true]);

    }







}
