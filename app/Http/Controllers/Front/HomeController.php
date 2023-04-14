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

class HomeController extends Controller
{

    public function index(Request $request)
    {
//по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = 'sozdanie-saitov' : $slug = $request->path();
//        dd($request->path());
//определяем id категории согласно слагу
        $cat = Category::where('slug', $slug)->first();

//проверяет существует ли категория если нет 404-ошибка
        self::errorPage($cat);

//  берем данные модулей
        $modules = Module::where('category_id', $cat->id)->with('types')->get();

        //берем через связь
        $data = $cat->posts()->get();
//dd($data);
        //проверяем на пустоту посты
        self::chekEmtyPost($data);


//получаем данные калькулятора
        $calcItems = $this->getCalcItems($cat);


        return view('byweb.home', compact('data', 'modules', 'calcItems'));
    }


    private static function errorPage($cat)
    {
//        dd($cat);
        if (!$cat || $cat = null) return abort(404, 'Ошибка 404 - страница не существует!');
    }

//если пусто уведомления, что нужно дабавить посты
    private static function chekEmtyPost($data)
    {
        if ($data->isEmpty()) return abort(404, 'Добавьте посты в административной части!');
    }


    private function getCalcItems(Category $cat)
    {
        $calcItems = CalcItem::with('calcTitle', 'calcModule', 'calcCategory')->get();

        if (!$calcItems->isEmpty()) {

            $myGroupe = [
                'module-title' => $calcItems[0]->calcModule->title,
                'module-desc' => $calcItems[0]->calcModule->description
            ];


            $getCalcCatagories = CalcCategory::pluck('title');

            foreach ($getCalcCatagories as $k => $calcCatagory) {
                foreach ($calcItems as $i => $calcItem) {

                    if ($calcCatagory == $calcItem->calcCategory->title) {

                        $myGroupe[$calcCatagory][$k][$i] = [
                            'title' => $calcItem->calcTitle->title,
                            'price' => $calcItem->price,
                            'class' => $calcItem->calcTitle->calcClasse()->get()[0]->title,
                            'type' => $calcItem->calcTitle->calcType()->get()[0]->title
                        ];
                    }

                }
            }

        } else {
            return $myGroupe = [];
        }

        dd($myGroupe);
        return $myGroupe;

    }


}
