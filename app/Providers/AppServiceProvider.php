<?php

namespace App\Providers;

use App\View\Components\Admin\Buttons\Create;
use App\View\Components\Admin\Buttons\BtnRoute;
use App\View\Components\Admin\FormFields\Select;
use App\View\Components\Admin\FormFields\SelectCategory;
use App\View\Components\Admin\FormFields\Input;
use App\View\Components\Admin\FormFields\TextAreaPost;
use App\View\Components\Admin\Formfields\InputChecked;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

//для глобальных переменных в автозагрузку и подключения сквозной переменной
use App\Models\admin\Category;
use App\Models\admin\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //убирает ошибку sql при миграции если не хватает там какой-то длины поля
        Schema::defaultStringLength(191);

        //регистрация компонента кнопка create
        Blade::component('btn-create', Create::class);
        //Регистрация select для формы
        Blade::component('select-field', Select::class);
        Blade::component('select-category', SelectCategory::class);
        Blade::component('input', Input::class);
        Blade::component('textarea', TextAreaPost::class);
        Blade::component('btn',BtnRoute::class);
        Blade::component('input-checked', InputChecked::class);

        //глобальная переменная - подсчет категорий и постов
        view()->share('countCategory', Category::all()->count());
        view()->share('countPost', Post::all()->count());

    }
}
