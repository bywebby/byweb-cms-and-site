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

use Illuminate\Support\Facades\Cache;


use App\Models\admin\Post;
use function PHPUnit\Framework\isEmpty;
use App\Http\Controllers\Front\Modules\Calc;

class HomeController extends Controller
{
    private $cats;
    private $modules;
    public $slug;

    public function __construct(Category $cats, Module $modules) {
        $this->cats = $cats;
        $this->modules = $modules;
    }

    public function index(Request $request, $slug = '', $slug2 = '')
    {
        //по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = config('byweb.home_page') : $slug = str_replace($slug.'/', '', $request->path());

        //определяем id категории согласно слагу
        $cat = $this->cats::where('slug', $slug)->where('status', 1)->first();

        //проверяет существует ли категория если нет 404-ошибка
        self::errorPage($cat, 'Такой страницы не существует!');

        //  берем данные модулей согласно категории
        $modules = $this->modules::where('category_id', $cat->id)->with('types')->get();

        //берем через связь все посты, которые относятся к данной категории
        $data = $cat->posts()->get();

//        $itemsGallery = $data->where('type_id',5);
//        dd('5555');

        //проверяем на пустоту посты
        self::chekEmtyPost($data, 'Добавьте посты в категории');

//        dump(Cache::get('my-groupe'));


//        dd($cat->id);

        //получаем калькулялтор к данной категории
        $calcItems = $this->getCalc($cat->id);


        return view('byweb.home', compact('data', 'modules', 'calcItems'));
    }





//метод получающий кальлькулятор, согласно действующей категории
    private function getCalc(int $catId)
    {

//dd($catId);
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
