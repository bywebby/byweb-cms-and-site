<?php

namespace App\Providers;

use App\Http\Controllers\Front\Modules\Menu;
use App\Models\admin\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

//нужен для передачи менб на всех страницах сквозным методом
// https://si-dev.com/ru/blog/laravel-view-composers

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //сквозная перемменая items для шаблона на всех страницах
        View::composer('byweb.html.layouts.contents.menu.index', function($view) {
            $cats = new Category();
            $menu = new Menu($cats);
            $view->with(['items' => $menu->getMenu]);

        });
    }
}
