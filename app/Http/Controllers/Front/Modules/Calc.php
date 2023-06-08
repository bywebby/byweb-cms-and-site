<?php


namespace App\Http\Controllers\Front\Modules;


use App\Models\admin\calc\CalcItem;
use App\Models\admin\calc\CalcCategory;
use function PHPUnit\Framework\isEmpty;

class Calc
{

    public $calcItems;
    public $getCalcCat;

    public function __construct(CalcCategory $getCalcCat, CalcItem $calcItems) {
        $this->getCalcCat = $getCalcCat;
        $this->calcItems = $calcItems;
    }


    public function getCalcItems(int $catId)
    {
        $myGroupe = [];

        $getCalcCat = $this->getCalcCat::pluck('title');

        $calcItems = $this->calcItems::with('calcTitle', 'calcModule', 'calcCategory')->get();

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

//        dd($myGroupe);
        return $myGroupe;

    } //end method

} //end Calc class
