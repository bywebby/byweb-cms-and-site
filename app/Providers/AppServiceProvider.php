<?php

namespace App\Providers;

use App\View\Components\Admin\Buttons\Create;
use App\View\Components\Admin\FormFields\Select;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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

    }
}
