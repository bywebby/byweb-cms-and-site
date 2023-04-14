<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;

use App\Models\admin\calc\CalcClasses;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Title\StoreTitle;
use App\Models\admin\calc\CalcTitle;
use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcType;

class TitleController extends Controller
{
    public $fields = ['title','calc_classes_id','calc_type_id'];

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

       $categories = CalcTitle::query()->paginate($page['step']);


       return view('admin.calc.title.index',compact('categories', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calcClasses = CalcClasses::pluck('title','id');
        $calcTypes = CalcType::pluck('title','id');
        return view('admin.calc.title.create', compact('calcClasses','calcTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitle $request)
    {
        $data = $request->only($this->fields);
        CalcTitle::create($data);
        return redirect()->route('calc.title.index')->with('success','Подвид услуги добавлен');
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
     * @param  int  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        $data = CalcTitle::findOrFail($title);
        $calcClasses = CalcClasses::pluck('title','id');
        $calcTypes = CalcType::pluck('title','id');
        return view('admin.calc.title.edit', compact('data','calcClasses', 'calcTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $title
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTitle $request, $title)
    {
        $data = $request->only(['title']);
        //$title - это id in DB, title в ресурсном контроллере параметр
        $cat = CalcTitle::findOrFail($title);



        $cat::where(['id' => $title])->update($data);
        return redirect()->route('calc.title.edit', ['title' => $title])->with('success','Подвид услуги обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CalcTitle::findOrFail($id);

        CalcTitle::destroy($id);

        return redirect()->route('calc.title.index')->with('success', 'Подвид услуги удален');


    }
}
