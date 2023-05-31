<?php

namespace App\Http\Controllers\Front;

use App\Models\admin\calc\CalcCategory;
use App\Models\admin\Category;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\calc\CalcModule;
use App\Models\admin\calc\CalcItem;

use Illuminate\Support\Facades\DB;


use App\Models\admin\Post;
use function PHPUnit\Framework\isEmpty;
use App\Http\Controllers\Front\Modules\Calc;

class HomeController extends Controller
{

    public function index(Request $request)
    {
//по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = 'sozdanie-saitov' : $slug = $request->path();
//        dd($request->path());
//определяем id категории согласно слагу
        $cat = Category::where('slug', $slug)->first();
//dd($cat->id);
//проверяет существует ли категория если нет 404-ошибка
        self::errorPage($cat);
        //  берем данные модулей согласно категории
        $modules = Module::where('category_id', $cat->id)->with('types')->get();

        //берем через связь все посты, которые относятся к данной категории
        $data = $cat->posts()->get();

        //проверяем на пустоту посты
        self::chekEmtyPost($data);

//        //получаем данные калькулятора
        $getCalcCat = new CalcCategory();
        $calcItems = new CalcItem();
        $calcItems = new Calc($getCalcCat, $calcItems);
        $calcItems = $calcItems->getCalcItems($cat->id);



        return view('byweb.home', compact('data', 'modules', 'calcItems'));
    }






    private static function errorPage($cat)
    {
        if (!$cat || $cat = null) return abort(404, 'Ошибка 404 - страница не существует!');
    }

//если пусто уведомления, что нужно дабавить посты
    private static function chekEmtyPost($data)
    {
        if ($data->isEmpty()) return abort(404, 'Добавьте посты в административной части!');
    }




}
