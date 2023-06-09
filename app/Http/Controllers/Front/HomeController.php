<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\Modules\Menu;
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
    private $cats;

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

        //получаем калькялтора к данной категории
        $calcItems = $this->getCalc($cat->id);

        return view('byweb.home', compact('data', 'modules', 'calcItems'));
    }

//метод получающий кальлькулятор, согласно действующей категории
    private function getCalc(int $catId)
    {
//        контроллек калькуялтора в каторый
        $calcItems = new Calc();
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
