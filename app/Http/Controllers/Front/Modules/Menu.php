<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class Menu extends Controller
{
    private $cats;
    public $getMenu;

    public function __construct(Category $cats)
    {
        //получает все категории
        $this->cats = $cats;
        //scrope getPublicMenu - дает опубликованные категории с показом в менб
        $this->getMenu = $this->buildTree($this->cats::getPublicMenu());
    }

//cats - $this->cats::where('show',1)->where('status',1)->get()
    private function buildTree($cats)
    {
        $grouped = $cats->groupBy('parrent_id');

        foreach ($cats as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $cats->where('parent_id', 0);
    }
}
