<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class Menu extends Controller
{
    private $cats;
    public $getMenu;

//    private $landingSlug = [
//        'cena',
//        'folio'
//    ];

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


            //реализуем якорные ссылки, которые прописаны в свойстве $this->landingSlug
//            $item->slug = $this->landingPageUrls($item->slug);


            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $cats->where('parent_id', 0);
    }

//    //добавляет # к slug
//    private function landingPageUrls(string $slug) : string {
////        dd(config('byweb.landing_page'));
////берем с конфига byweb перечень landing page
//        if (!config('byweb.landing_page')) return $slug;
//
//        foreach (config('byweb.landing_page') as $i) {
//
////            dd($slug);
//            $i == $slug ? $slug = '#'.$slug : $slug;
//
//        }
//        return $slug;
//    }

}
