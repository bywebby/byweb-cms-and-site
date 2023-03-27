<?php

namespace App\Http\Controllers\Front;

use App\Models\admin\Category;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Post;

class HomeController extends Controller {

    public function index(Request $request) {
//по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = 'sozdanie-saitov' : $slug = $request->path();
//        dd($request->path());
//определяем id категории согласно слагу
        $cat = Category::where('slug', $slug)->first();

//        dd($cat);
//проверяет существует ли категория если нет 404-ошибка
       self::errorPage($cat);

//  берем данные модулей
        $modules = Module::where('category_id',$cat->id)->with('types')->get();

        //берем через связь
        $data = $cat->posts()->get();
//        dd($modules, $data);
         //dd($data);
            return view('byweb.home', compact('data', 'modules'));
    }


    private static function errorPage($cat){
//        dd($cat);
        if(!$cat || $cat = null) return abort(404,'Ошибка 404 - страница не существует!');
    }


}
