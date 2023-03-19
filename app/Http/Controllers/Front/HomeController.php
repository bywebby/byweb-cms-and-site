<?php

namespace App\Http\Controllers\Front;

use App\Models\admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Post;

class HomeController extends Controller {

    public function index(Request $request) {


//по категории находим контент в зависимости от слага
        $request->path() == '/' ? $slug = 'sozdanie-saytov' : $slug = $request->path();
        //dd($slug);
//определяем id категории согласно слагу
        $cat = Category::query()->where('slug', $slug)->firstOrFail();

        //берем через связь
        $data = $cat->posts()->get();
         //dd($data);
            return view('byweb.home', compact('data'));
    }

}
