<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use App\Models\admin\calc\CalcItem;
use Illuminate\Http\Request;
use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcModule;
use App\Models\admin\calc\CalcTitle;
use App\Http\Requests\Calc\StoreItem;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Helpers;


class ItemsController extends Controller
{
    public $fields = [
        'calc_title_id',
        'price',
//        'calc_module_id',
        'calc_category_id',
        'checked',
        'status',
        'save',
    ];

    private $page = '20';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CalcItem $calcItem)
    {
        $page = [
            'step' => $this->page, //шаг пагинации
            'num' => $request->get('page'),
            //get параметры для сортировки по категориям и по модулям
            'category' => $request->get('category'),
            'module' => $request->get('module'),
        ];
//данные с базы со связями
        $items = $calcItem::with('calcTitle', 'calcModule', 'calcCategory');

//сортировка по модулям и по пагинации
        switch (true) {
            case $page['category'] == null and $page['module'] == null:
                $data = $items;
                break;
            case $page['category'] and $page['module'] == null:
                $data = $items->where('calc_category_id', $page['category']);
                break;
            case $page['module'] and $page['category'] == null:
                $data = $items->whereRelation('calcModule', 'id', $page['module']);
                break;
            case $page['module'] != null and $page['category'] != null:
//                                                                              выборка по связи
                $data = $items->where('calc_category_id', $page['category'])->whereRelation('calcModule', 'id', $page['module']);
                break;
        }
//пагинация
            $data = $data->paginate($page['step']);

        return view('admin.calc.items.index', compact('data','page'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $calcTitles = CalcTitle::pluck('title', 'id');
        $calcModules =  CalcModule::pluck('title', 'id');
        $calcCategories = CalcCategory::pluck('title', 'id');
        return view('admin.calc.items.create', compact('calcTitles', 'calcModules', 'calcCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $data = $request->only($this->fields);

        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;
        isset($data['checked']) ? $data['checked'] = 1 : $data['checked'] = 0;

        CalcItem::create($data);


        //удаляет кеш
        Artisan::call('cache:clear');
//        Helpers::forgetCache($this->cacheKeys);

        return redirect()->route('calc.item.index')->with('success', 'Блок сохранен');



    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calcTitles = CalcTitle::pluck('title', 'id');
        $calcModules =  CalcModule::pluck('title', 'id');
        $calcCategories = CalcCategory::pluck('title', 'id');
        $data = CalcItem::findOrFail($id);

        return view('admin.calc.items.edit', compact('data','calcTitles','calcModules','calcCategories'));
    }

    /**
     * @param StoreItem $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreItem $request, int $id)
    {
        $data = $request->only($this->fields);
//кнопка отмена
       if($data['save'] == 'Отмена') return redirect()->route('calc.item.index');

       //отработка чекбоксов
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;
        isset($data['checked']) ? $data['checked'] = 1 : $data['checked'] = 0;
//        dd($data);

        $calcItem= CalcItem::with('calcModule')->findOrFail($id);

        $calcItem->update($data);

        //удаляет кеш
        Artisan::call('cache:clear');

//        dd(Cache::get('calc-items'));

//кнопки сохранить и сохранить закрыть
        switch ( $data['save']) {
            case 'Сохранить':
                return redirect()->route('calc.item.edit',['item'=>$id])->with('success','Блок обновлен');
            case 'Сохранить и закрыть':
                return redirect()->route('calc.item.index')->with('success','Блок обновлен');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $calcItem= CalcItem::findOrFail($id);



        //удаляет кеш
        Artisan::call('cache:clear');



//        CalcItem::findOrFail($id)->delete($id);
        $calcItem->delete($id);



        return redirect()->route('calc.item.index')->with('success','Блок удален');
    }
}
