<?php


namespace App\Http\Controllers\Front\Modules;


use App\Models\admin\calc\CalcItem;
use App\Models\admin\calc\CalcCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\isEmpty;

class Calc
{

    private $calcItems;
    private $getCalcCat;

    private $timeCache = 60*24*3;

    public function __construct() {
        //        категории калькулятора
        $this->getCalcCat = new CalcCategory();
        //item калькулятора модель
        $this->calcItems = new CalcItem();
    }

    public function getCalcItems(int $catId)
    {
        $myGroupe = [];
//dd($catId);
//кеширование данных

        if (Cache::has('calc-cat')) {
            $getCalcCat = Cache::get('calc-cat');
        } else {
            $getCalcCat = $this->getCalcCat::pluck('title');
            Cache::put('calc-cat', $getCalcCat, now()->addMinutes($this->timeCache));
        }

        if(Cache::has('calc-items')) {
            $calcItems  = Cache::get('calc-items');
        } else {
            $calcItems = $this->calcItems::with('calcTitle', 'calcModule', 'calcCategory')->get();
            Cache::put('calc-items',$calcItems, now()->addMinutes($this->timeCache));
        }

if( !Cache::has('my-groupe'.$catId) ) {

    if ($calcItems->isNotEmpty()) {

        foreach ($calcItems as $calcItem){
            if ($calcItem->calcModule->category_id == $catId) {
                $myGroupe = [
                    'module-title' => $calcItem->calcModule->title,
                    'module-desc' => $calcItem->calcModule->description,
                ];

                foreach ($getCalcCat as $k => $calcCat) {
                    foreach ($calcItems as $i => $calcItem) {
                        if ($calcCat == $calcItem->calcCategory->title and $calcItem->calcModule->category_id == $catId) {
                            $myGroupe[$calcCat][$k][$i] = [
                                'title' => $calcItem->calcTitle->title,
                                'price' => $calcItem->price,
                                'class' => $calcItem->calcTitle->calcClasse()->get()[0]->title,
                                'type' => $calcItem->calcTitle->calcType()->get()[0]->title,
                                'status' => $calcItem->status,
                                'checked' =>$calcItem->checked,
                            ];
                        }


                        //endif
                    } //end foreach
                }  //end foreach
            }//end if

        }
    }

    Cache::put('my-groupe'.$catId, $myGroupe, $this->timeCache);

//    dd(Cache::get('my-groupe'));
}




//        return $myGroupe;
//dd(Cache::get('my-groupe'));
        return Cache::get('my-groupe'.$catId);


    } //end method

} //end Calc class
