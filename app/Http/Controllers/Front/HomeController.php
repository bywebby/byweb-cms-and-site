<?php

namespace App\Http\Controllers\Front;

use App\Models\admin\Category;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isEmpty;
use App\Http\Controllers\Front\Modules\Calc;

class HomeController extends Controller
{
    private $cats;
    private $modules;
    public $slug;
    private $calc;
    private $error_404 = '404 ошибка!';

    public function __construct(Category $cats, Module $modules, Calc $calc) {
        //категории поста
        $this->cats = $cats;
        //модули статей
        $this->modules = $modules;
        //модуль калькулятора
        $this->calc = $calc;
    }

    public function index(Request $request, $slug = '', $slug2 = '')
    {
        //по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = config('byweb.home_page') : $slug = str_replace($slug.'/', '', $request->path());
        //определяем id категории согласно слагу
        $cat = $this->cats::where('slug', $slug)->where('status', 1)->first();
        //проверяет существует ли категория если нет 404-ошибка
        $this->errorPage($cat, 'Такой страницы не существует!');
        //  берем данные модулей согласно категории

        $modules = $this->modules::getPublicModules($cat->id);

        //берем через связь все посты, которые относятся к данной категории
        $data = $cat->posts()->get();
        //проверяем на пустоту посты
        $this->chekEmtyPost($data, 'Добавьте посты в категорию');
        //получаем калькулялтор к данной категории
        $calcItems = $this->calc->getCalcItems($cat->id);
        return view('byweb.home', compact('data', 'modules', 'calcItems'));
    }

    private function errorPage($data, string $msg = '')
    {
        if ( !$data || $data == null ) return abort(404, $this->error_404.' '.$msg);
    }

//если пусто уведомления, что нужно дабавить посты
    private function chekEmtyPost($data, string $msg = '')
    {
        if ($data->isEmpty()) return abort(404, $this->error_404.' '.$msg);
    }

}
