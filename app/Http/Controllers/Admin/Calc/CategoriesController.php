<?php

namespace App\Http\Controllers\Admin\Calc;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\StoreCategory;
use App\Models\admin\calc\CalcCategory;
use App\Models\admin\calc\CalcClasses;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Admin\Calc\Helpers;

use App\Models\admin\calc\CalcModule;


class CategoriesController extends Controller
{
    public $fields = ['title', 'calc_classes_id', 'calc_modules'];



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $page = [
            'step' => 10, //шаг пагинации
            'num' => $request->get('page')
        ];
        $data = CalcCategory::paginate($page['step']);
        return view('admin.calc.categories.index', compact('data', 'page'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $calcClasses = CalcClasses::pluck('title', 'id');

        $modules = CalcModule::pluck('title', 'id');

        return view('admin.calc.categories.create', compact('calcClasses', 'modules'));
    }

    /**
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategory $request)
    {
        $data = $request->only($this->fields);
//        unset($data['calc_modules']);
        $CalcCategory = CalcCategory::create($data);
        //синхронизируем с промежуточной таблицей

//        dd($CalcCategory->calcModules()->get());

        $CalcCategory->calcModules()->sync($request->calc_modules);



        //удаляет кеш
        Artisan::call('cache:clear');

        return redirect()->route('calc.category.index')->with('success', 'категория сохранена');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CalcCategory::findOrFail($id);

//        dd($data);
//        $modules = CalcModule::pluck('title','id');
        $modulesSelected = $data->calcModules()->get()->pluck('title', 'id');
        $modules = CalcModule::pluck('title', 'id');


//        dd($modules);

        //категории калькулятора
        $calcClasses = CalcClasses::pluck('title', 'id');
        return view('admin.calc.categories.edit', compact('data',  'calcClasses', 'modules', 'modulesSelected'));
    }

    /**
     * @param StoreCategory $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCategory $request, int $id)
    {
        $data = $request->only($this->fields);

//        dd($data);

        $calcCategory = CalcCategory::findOrFail($id);

        $calcCategory->update($data);

        $calcCategory->calcModules()->sync($request->calc_modules);



//        dd($calcCategory);

        //удаляет кеш ['calc-cat', 'my-groupe']
//        Helpers::forgetCache($this->cacheKeys);

        //удаляет кеш
        Artisan::call('cache:clear');

        return redirect()->route('calc.category.edit', ['category' => $id])->with('success', 'Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $calcCategory = CalcCategory::findOrFail($id);
        //синхронизирует многие ко многим с промежуточной таблицей
        $calcCategory->calcModules()->sync([]);
        //удаляет все со связьб по синхронизации выше
        $calcCategory->destroy($id);
        //удаляет весь кеш глобально
        Artisan::call('cache:clear');

        return redirect()->route('calc.category.index')->with('success', 'Категория удалена');
    }
}
