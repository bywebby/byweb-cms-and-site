<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Classes\StoreClasses;
use App\Models\admin\calc\CalcClasses;

class ClassesController extends Controller
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

        $data = CalcClasses::query()->paginate($page['step']);


        return view('admin.calc.class.index', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.calc.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClasses $request)
    {
        $data = $request->only(['title', 'description']);

        CalcClasses::create($data);

        return redirect()->route('calc.class.index')->with('success','Класс добавлен');


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
     * @param  int  $class
     * @return \Illuminate\Http\Response
     */
    public function edit($class)
    {
        $data = CalcClasses::findOrFail($class);
        return view('admin.calc.class.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClasses $request, $class)
    {
        $data = $request->only(['title', 'description']);
        CalcClasses::findOrFail($class);
        CalcClasses::update($data);

        return redirect()->route('calc.class.index')->with('success','Класс обновлен');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy($class)
    {
        CalcClasses::findOrFail($class);
        CalcClasses::destroy($class);
        return redirect()->route('calc.class.index')->with('success', 'Класс удален');

    }
}
