<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\StoreCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use App\Models\admin\menu\MenuType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//use Lavary\Menu\Facade as LavMenu;


class CategoryController extends Controller {


    public $catFileds = [
        'title',
        'slug',
        'meta_title',
        'meta_desc',
        'status',
        'parrent_id',
        'show',
        'menu_type_id',
        'class'
    ];

    public function index(Request $request) {

//пагинация категории
        //параметры пагинации для нумерации записей постранично с заданным шагом
        $page = [
            'step' => 10, //шаг пагинации
            'num' => $request->get('page')
        ];
        $categories = Category::query()->with('nameCategory')->paginate($page['step']);

//        dd($categories);

//        возвращаем вид и перадем категории
        return view('admin.categories.index',compact('categories','page'));
    }

//возвращает форму для создания
    public function create()  {

        $cats = Category::with('menuTypes')->where('status',1)->get();

//        dd($cats);
        $menuTypes = MenuType::all();

        return view('admin.categories.create', compact('cats', 'menuTypes'));
    }

//возвращает форму для сохранения
    public function store(StoreCategory $request) {

        $data = $request->only($this->catFileds);
        //перевод в транслит
        $data['slug']= Str::slug($data['slug'],'-');
//        dd($data);
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Категоря добавлена');
    }

    public function edit($id) {

        $this->error404($id);
        $category = Category::find($id);

        $cats = Category::all();
        $menuTypes = MenuType::all();

        return view('admin.categories.edit',compact('category', 'cats', 'menuTypes'));
    }

//возвращает 404 ошибку
    private function error404($id) {

        if(!Category::find($id)) {
            abort(404, "<h2>404 - ошибка!</h2> <p><b>Категория с id:</b><br />$id<br />не существует!</p>");
        }

    }

    public function update(UpdateCategory $request, $id) {
        $this->error404($id);
        $data = $request->only($this->catFileds);

        //перевод в транслит
        $data['slug'] = Str::slug($data['slug'],'-');

          if($request->input('save') == 'Отмена')   {
              return redirect()->route('categories.index');
          }

            $category = Category::find($id);
            $category->update($data);

          if ($request->input('save') == 'Сохранить и закрыть') {
              return redirect()->route('categories.index')->with('success',('Категоря обновлена'));
          }

        return redirect()->route('categories.edit',['category' => $category->id])->with('success','Категоря обновлена');
    }

    public function destroy($id) {

        $this->error404($id);
        $category = Category::find($id);
        if($category->posts->count() == 0) {
            Category::destroy($id);
            return redirect()->route('categories.index')->with('success', 'Категоря удалена');
        } else {
            return redirect()->route('categories.index')->with('danger', 'Категоря не удалена, т.к. содержит посты<br /> &ndash; удалите вначале посты!');
        }

    }


}//end class !
