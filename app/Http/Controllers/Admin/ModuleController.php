<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\StoreModule;
use App\Models\admin\Category;
use App\Models\admin\Module;
use App\Models\admin\Type;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    //список модулей
    public function index(Request $request) {
        //параметры пагинации для нумерации записей постранично с заданным шагом
        $page = [
            'step' => 10,
            'num' => $request->get('page')
        ];

        $modules = Module::paginate($page['step']);

        return view('admin.modules.index',  compact('modules','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //получаем все категории для постов
        $categories = Category::pluck('title','id')->all();
        if (!$categories) return redirect()->route('categories.index')->with('danger','Перед тем как создать модуль - создайте категорию');
//        dd($categories);
        //получаем все типы статей
        $types = Type::pluck('title','id')->all();
        if (!$types) return redirect()->route('types-posts.index')->with('danger','Перед тем как создать модуль - создайте тип статьи');
        //возвращает форму для создания
        return view('admin.modules.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModule $request) {
//       dd($request->input());
        //берем с запроса форма только поля
        $data = $request->input();
        Module::create($data);
        return redirect()->route('modules.index')->with('success','Модуль добавлен');
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
    public function edit($id) {

        $module = Module::with('types')->with('categories')->findOrFail($id);

        $categories = Category::pluck('title','id')->all();

        //получаем все типы статьи
        $types = Type::pluck('title','id')->all();

        //dd($post->category->title);
        return view('admin.modules.edit', compact('module', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreModule $request, $id) {
        $data = $request->input();
        Module::findOrFail($id)->update($data);
        return redirect()->route('modules.edit', ['module' => $id])->with('success','Модуль обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Module::findOrFail($id)->delete($id);
        return redirect()->route('modules.index')->with('success','Модуль удален');
    }
}
