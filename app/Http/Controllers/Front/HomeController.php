<?php

namespace App\Http\Controllers\Front;

use App\Models\admin\calc\CalcCategory;
use App\Models\admin\Category;
use App\Models\admin\Module;
use Illuminate\Database\Eloquent\Model;
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
    public $cats;

    public function __construct(Category $cats) {
        $this->cats = $cats;
    }

    public function index(Request $request)
    {
//по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = 'sozdanie-saitov' : $slug = $request->path();
//        dd($request->path());
//определяем id категории согласно слагу
        $cat = $this->cats::where('slug', $slug)->where('status', 1)->first();

//проверяет существует ли категория если нет 404-ошибка
        self::errorPage($cat, 'Такой страницы не существует!');
        //  берем данные модулей согласно категории
        $modules = Module::where('category_id', $cat->id)->with('types')->get();

        //берем через связь все посты, которые относятся к данной категории
        $data = $cat->posts()->get();

        //проверяем на пустоту посты
        self::chekEmtyPost($data, 'Добавьте посты в категории');

        //получаем данных калькулятора
        $calcItems = $this->getCalc($cat->id);

        $menuitems = $this->buildTree($this->cats::where('show',1)->where('status',1)->get());

        return view('byweb.home', compact('data', 'modules', 'calcItems', 'menuitems'));
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parrent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $items->where('parent_id', 0);
    }

//метод получающий кальлькулятор, согласно действующей категории
    public function getCalc(int $catId)
    {
//        категории калькулятора
        $getCalcCat = new CalcCategory();
        //item калькулятора модель
        $calcItem = new CalcItem();
//        контроллек калькуялтора в каторый
        $calcItems = new Calc($getCalcCat, $calcItem);
        //возвращает в нужном формате данные калькулятора
        return $calcItems->getCalcItems($catId);
    }

    private static function errorPage($data, string $msg = '')
    {
        if ( !$data || $data == null ) return abort(404, $msg);
    }

//если пусто уведомления, что нужно дабавить посты
    private static function chekEmtyPost($data)
    {
        if ($data->isEmpty()) return abort(404, 'Добавьте посты в административной части!');
    }

}
