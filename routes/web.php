<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//возвращает вьюшку и именнованная ссылка home {{home}} для подстановки во вьюшку


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\Calc\TitleController;
use App\Http\Controllers\Admin\Calc\ClassesController;
use App\Http\Controllers\Admin\Calc\TypesController;
use App\Http\Controllers\Admin\Calc\ModuleController as CalcModule;
use App\Http\Controllers\Admin\Calc\CategoriesController;
//Очистка кеша
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Кэш очищен.";
});

//адимн панель
    Route::group(['prefix' => 'admin'], function () {
//    главная админ панель
    Route::get('/', [PostController::class, 'index'])->name('admin.index');

//    категории админ панель
    Route::resource('categories',CategoryController::class);

//  типы статей админ панель
    Route::resource('types-posts',TypeController::class);

//посты модули статей
    Route::resource('posts',PostController::class);
//удаление изображения с поста
    Route::get('posts/{id}/edit/delImg', [PostController::class, 'delImg'])->name('posts.edit.delImg');
//модули фронта для группировки контента
    Route::resource('modules', ModuleController::class);

//компонент колькулятора
    Route::prefix('calc')->name('calc.')->group(function () {
            Route::resource('title', TitleController::class);
            Route::resource('class',ClassesController::class);
            Route::resource('types', TypesController::class);
            Route::resource('modules', CalcModule::class);
            Route::resource('category', CategoriesController::class);

    });

});


//клиентская часть
Route::group(['namespace' => 'Front'],function () {
    Route::get('/{slug?}', [HomeController::class,'index'])->name('home');
    Route::get('/{slug?}/{slug2?}', [HomeController::class,'index'])->name('home1');







});










