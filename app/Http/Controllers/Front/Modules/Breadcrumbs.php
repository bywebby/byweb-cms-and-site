<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class Breadcrumbs extends Controller
{

    public $data = [
        'Главная' => '/',
    ];

    public $slugs = [];

    public $names = [
        'uslugi' => 'Услуги',
    ];


    public function __construct(string $slug = '', string $slug2 = '', Category $currentPaage, $request_path)
    {


        $this->slugs = [$slug, $slug2];
        $this->data += $this->getData($currentPaage, $request_path);
//        dd($this->data);
    }

    private function getData(Category $currentPage, $request_path)
    {

        if($request_path == '/') return $this->data = [];

//получаем данные с контроллера по слагам и текущему урлу
        $data = [
            $this->slugs[0],
            $this->slugs[1],
            $currentPage->title => $currentPage->slug
        ];

        //очищаем массив от пустых данных
        $data = $this->filterEmptyData($data);

//        dd(is_array($data));

        //если слаги совпадают, значит там есть родитель
if (is_array($data) and $data) $data =  $this->filterParrent($data);



        //вычисляем родителся первого уровня
         $data = $this->setParrent($request_path, $currentPage, $data);

         return $data;
        }

    //очиoаем массив от пустых данных
    private function filterEmptyData(array $data): array
    {
        //очизаем массив от пустых данных
        if ($this->slugs[0] == '' || $this->slugs[1] == '') {
            foreach ($data as $k => $i) {
                unset($data[$k]);
            }
        }

        return $data;
    }

    private function filterParrent(array $data)
    {
        //если слаги совпадают, значит там есть родитель
        if ($this->slugs[0] == $this->slugs[1]) {
            foreach ($data as $k => $i) {
                unset($data[$k]);
            }

            return $data;
        }
    }

    //вычисляем родителся первого уровня
    private function setParrent(string $request_path, Category $currentPage, $data): array {

        //вычисляем родителся первого уровня
        $url = explode('/', $request_path);
        //записываем в массив данные для ссылок 2-го уровня с родителем
        if ($url[0] != '') {
            foreach ($this->names as $k => $i) {
                if($url[0] == $k) $data[$i] = $url[0];
            }


            $data[$currentPage->title] = $currentPage->slug;
        }
        return $data;

    }


}
