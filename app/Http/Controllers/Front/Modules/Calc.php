<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use App\Models\admin\calc\CalcItem;
//use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcModule;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\isEmpty;

class Calc extends Controller
{
    private $calcItems;
//    private $getCalcCat;
    private $modules;
//время жизни кеша модуля калькулятор минуты 7 дней
    private $timeCache = 60 * 24 * 7;

    public function __construct()
    {
        // категории калькулятора
//        $this->getCalcCat = new CalcCategory();
        //items калькулятора модель
        $this->calcItems = new CalcItem();
        //модули калькулятора модель
        $this->modules = new CalcModule();


    }

//получаем модули по категории из слага
    private function getModule(int $catId)
    {
        return $this->modules::where('category_id', $catId)->with('calcCategories')->get();
    }

    private function getCalcCategories(int $catId)
    {
        return $this->getModule($catId)->calcCategories;
    }

    public function getCalcItems(int $catId)
    {
        $myGroupe = [];
        //данные модуля
        $module = $this->getModule($catId);

//        dd($module->isEmpty());
        if( $module->isEmpty() ) return null;
//получаем все items с заголовками, модулями, категориями

        $keyCalcItems = 'calc-items' . $catId;

        if (Cache::has($keyCalcItems)) {
            $calcItems = Cache::get($keyCalcItems);
        } else {
            $idCalcCats = $module[0]->calcCategories->pluck('id');
            //все items относящиеся к конкретному модулю           //все id категории конкретного модуля
            $calcItems = $this->calcItems->wherein('calc_category_id', $idCalcCats)->with('calcCategory', 'calcTitle')->get();
            Cache::put($keyCalcItems, $calcItems, now()->addMinutes($this->timeCache));
        }

        $myGroupe = [
            'module-title' => $module[0]->title,
            'module-desc' => $module[0]->description,
        ];

//        dd(Cache::get('calc-items'));
//если пусто, то не выводим модуль
        if ($calcItems->isEmpty()) return null;
//        dd($calcItems);
//формирует массив для VUE фронта
        foreach ($calcItems as $i => $calcItem) {

            $myGroupe[$calcItem->calcCategory->title][$calcItem->calcCategory->id][$i] = [
                'title' => $calcItem->calcTitle->title,
                'price' => $calcItem->price,
                'class' => $calcItem->calcTitle->calcClasse()->first()->title,
                'type' => $calcItem->calcTitle->calcType()->first()->title,
                'status' => $calcItem->status,
                'checked' => $calcItem->checked,
            ];

        } //end foreach

//            dd($myGroupe);

        //кеширую весь массив для vue
        $keyMyGroupe = 'my-groupe' . $catId;
        Cache::put($keyMyGroupe , $myGroupe, $this->timeCache);

        //возвращаем из кеша данные
        return Cache::get($keyMyGroupe );

    } //end method

} //end Calc class
