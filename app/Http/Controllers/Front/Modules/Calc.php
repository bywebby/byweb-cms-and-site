<?php


namespace App\Http\Controllers\Front\Modules;


use App\Models\admin\calc\CalcItem;
use App\Models\admin\calc\CalcCategory;

class Calc
{

    public $calcItems;
    public $getCalcCat;


    public function __construct(CalcCategory $getCalcCat, CalcItem $calcItems) {

        $this->getCalcCat = $getCalcCat;
        $this->calcItems = $calcItems;



    }


    public function getCalcItems()
    {
        $getCalcCat = $this->getCalcCat::pluck('title');
        $calcItems = $this->calcItems::with('calcTitle', 'calcModule', 'calcCategory')->get();

        if (!$calcItems->isEmpty()) {

            $myGroupe = [
                'module-title' => $calcItems[0]->calcModule->title,
                'module-desc' => $calcItems[0]->calcModule->description
            ];

            foreach ($getCalcCat as $k => $calcCat) {
                foreach ($calcItems as $i => $calcItem) {

                    if ($calcCat == $calcItem->calcCategory->title) {

                        $myGroupe[$calcCat][$k][$i] = [
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

//        dd($myGroupe);
        return $myGroupe;

    }




}
