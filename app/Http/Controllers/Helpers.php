<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class Helpers extends Controller
{
    //удлаяет кеш по ключу
   public static function forgetCache(array $arrKeys) {

           foreach ($arrKeys as $key) {
               if( Cache::has($key) ) {

                   Cache::forget($key);

 //костыль поскольку кеш генерируется от id категории из постов к которой принадлежит калькулятор, писать метод отлеживания категорий - ну так себе работа, поэтому чищу глобальновесь кеш
                   Artisan::call('cache:clear');
               }
           }

   }
}
