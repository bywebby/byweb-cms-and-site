<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Helpers extends Controller
{
    //удлаяет кеш по ключу
   public static function forgetCache(array $arrKeys) {
       foreach ($arrKeys as $key) {
           if( Cache::has($key) ) {
               Cache::forget($key);
           }
       }
   }
}
