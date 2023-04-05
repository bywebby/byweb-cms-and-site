<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Title\StoreTitle;
use App\Models\admin\calc\CalcTitle;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        dd('5');
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
       return view('admin.calc.title.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitle $request)
    {
        $data = $request->only(['title']);

        CalcTitle::create($data);

        return redirect()->route('calc.title.index')->with('success','Категоря добавлена');
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
        return view('admin.calc.title.edit', compact('data'));
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
        CalcTitle::findOrFail($title);
        CalcTitle::update($data);
        return redirect()->route('calc.title.edit', ['title' => $title])->with('success','Категоря обновлена');
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

        return redirect()->route('calc.title.index')->with('success', 'Категоря удалена');


    }
}
