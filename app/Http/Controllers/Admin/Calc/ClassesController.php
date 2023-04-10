<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Classes\StoreClasses;
use App\Models\admin\calc\CalcClasses;

class ClassesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
//пагинация
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
     * @param int $class
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $class)
    {
        $data = CalcClasses::findOrFail($class);
        return view('admin.calc.class.edit', compact('data'));
    }

    /**
     * @param StoreClasses $request
     * @param int $class
     * @param CalcClasses $db
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreClasses $request, int $class)
    {
        $data = $request->only(['title', 'description']);
        CalcClasses::findOrFail($class)->update($data);
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
