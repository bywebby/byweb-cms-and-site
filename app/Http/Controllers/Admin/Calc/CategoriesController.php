<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\StoreCategory;
use App\Models\admin\calc\CalcCategory;

class CategoriesController extends Controller
{

    public $fields = ['title'];

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

        $data = CalcCategory::paginate($page['step']);
//        dd($data);

        return view('admin.calc.categories.index', compact('data','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calc.categories.create');
    }

    /**
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategory $request)
    {
        $data = $request->only($this->fields);
        CalcCategory::create($data);
        return redirect()->route('calc.category.index')->with('success','категория сохранена');
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
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CalcCategory::findOrFail($id);
        CalcCategory::destroy($id);
        return redirect()->route('calc.category.index')->with('success', 'Категория удалена');
    }
}
