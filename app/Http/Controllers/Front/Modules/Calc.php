<?php


namespace App\Http\Controllers\Front\Modules;


use App\Models\admin\calc\CalcItem;
use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\isEmpty;

class Calc
{

    private $calcItems;
    private $getCalcCat;

    private $modules;
//минуты 7 дней
    private $timeCache = 60 * 24 * 7;

    public function __construct()
    {
        // категории калькулятора
        $this->getCalcCat = new CalcCategory();
        //item калькулятора модель
        $this->calcItems = new CalcItem();

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

//        dd($catId);

//получаем все items с заголовками, модулями, категориями
        if (Cache::has('calc-items'.$catId)) {
            $calcItems = Cache::get('calc-items'.$catId);
        } else {
            $idCalcCats = $module[0]->calcCategories->pluck('id');
            //все items относящиеся к конкретному модулю           //все id категории конкретного модуля
            $calcItems = $this->calcItems->wherein('calc_category_id', $idCalcCats)->with('calcCategory', 'calcTitle')->get();
            Cache::put('calc-items'.$catId, $calcItems, now()->addMinutes($this->timeCache));
        }

        $myGroupe = [
            'module-title' => $module[0]->title,
            'module-desc' => $module[0]->description,
        ];

//        dd(Cache::get('calc-items'));

        if ($calcItems->isEmpty()) return null;
//        dd($calcItems);

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
        Cache::put('my-groupe' . $catId, $myGroupe, $this->timeCache);
        return Cache::get('my-groupe' . $catId);


    } //end method

} //end Calc class
