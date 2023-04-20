<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use App\Models\admin\calc\CalcItem;
use Illuminate\Http\Request;
use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcModule;
use App\Models\admin\calc\CalcTitle;
use App\Http\Requests\Calc\StoreItem;


class ItemsController extends Controller
{
    public $fields = [
        'calc_title_id',
        'price',
        'description',
        'calc_module_id',
        'calc_category_id',
        'checked',
        'status'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = [
            'step' => 10, //шаг пагинации
            'num' => $request->get('page')
        ];

        $data = CalcItem::with('calcTitle', 'calcModule', 'calcCategory')->paginate($page['step']);


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

        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;
        isset($data['checked']) ? $data['checked'] = 1 : $data['checked'] = 0;
//        dd($data);

        CalcItem::findOrFail($id)->update($data);
        return redirect()->route('calc.item.edit',['item'=>$id])->with('success','Блок обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CalcItem::findOrFail($id)->delete($id);
        return redirect()->route('calc.item.index')->with('success','Блок удален');
    }
}
