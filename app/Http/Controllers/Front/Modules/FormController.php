<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use App\Mail\Front\FormFeedBack;
use Illuminate\Http\Request;
use App\Http\Requests\Front\Form;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{

    public $status = false;


    public function formFront(Form $request) {

//        данные формы о валидации Form
        $data = $request->input();

        if($data) {
            Mail::to('info@byweb.by')->send(new FormFeedBack($data));

             //statusForm - ключ в сессии, который сигнализирует об успешной отправки формы
            return redirect()->back()->with(['success' => 'Ваш запрос отправлен!', 'statusForm' => true]);


        }


    }







}
