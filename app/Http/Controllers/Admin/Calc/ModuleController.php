<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Module\StoreModuleCalc;
use App\Models\admin\calc\CalcModule;

class ModuleController extends Controller
{
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

        $data = CalcModule::query()->paginate($page['step']);



        return view('admin.calc.module.index', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::pluck('title', 'id');

//        dd($category);


       return view('admin.calc.module.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleCalc $request)
    {
       $data = $request->only([
            'title',
            'description',
            'category_id'
        ]);
       CalcModule::create($data);
       return redirect()->route('calc.modules.index')->with('success','Модуль добавлен');;

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
     * @param  int  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($module)
    {
        $data = CalcModule::findOrFail($module);
        $category = Category::pluck('title', 'id');
        return view('admin.calc.module.edit', compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($module)
    {
        CalcModule::findOrFail($module);
        CalcModule::destroy($module);
        return redirect()->route('calc.modules.index')->with('success', 'Модуль удален');

    }
}
