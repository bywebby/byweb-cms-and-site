<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SapeServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {

            if (!defined('_SAPE_USER')) define('_SAPE_USER', '7613230a4dfedc50daddd763f33b1833');

                $sapePath = $_SERVER['DOCUMENT_ROOT'] . '/' . _SAPE_USER . '/sape.php';
                $checkFile = is_file($sapePath) ? $sapePath : false;

                if(!$checkFile) {
                    $sapePath = $_SERVER['DOCUMENT_ROOT'] . '/public/' . _SAPE_USER . '/sape.php';
                    $checkFile = is_file($sapePath) ? $sapePath : false;
                }
                if($checkFile) {
                    require_once $sapePath;
                    $options = [];
                    $options['force_show_code'] = true;
                    $sape = new \SAPE_client($options);
                    $view->with(compact('sape'));
                } else {
                    die('Не смог подключить Sp файл маркетинг');
                }

        });
    }
}
