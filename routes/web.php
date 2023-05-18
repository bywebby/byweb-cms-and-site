<?php
use App\Http\Controllers\Admin\AuthController;
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
use App\Http\Controllers\Admin\Calc\ItemsController;

//Очистка кеша закрытая админкой
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Кэш очищен!";
})->middleware('admin');

//адимн панель
    //авторизация
    Route::get('/auth', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/auth', [AuthController::class, 'login'])->name('admin.auth');

    //админка
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    //выйти с админки
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    //    главная админ панель после авторизации
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
            Route::resource('class', ClassesController::class);
            Route::resource('types', TypesController::class);
            Route::resource('modules', CalcModule::class);
            Route::resource('category', CategoriesController::class);
            Route::resource('item', ItemsController::class);
        });
});


//клиентская часть
Route::group(['namespace' => 'Front'],function () {
//    Route::get('/{slug?}', [HomeController::class,'index'])->name('home');
    Route::get('/{slug?}/{slug2?}', [HomeController::class,'index'])->name('home');
});










