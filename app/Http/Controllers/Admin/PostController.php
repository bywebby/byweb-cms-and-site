<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Posts\StorePost;
use App\Models\admin\Category;
use App\Models\admin\Post;
use App\Models\admin\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PostController extends Controller {

    //поля формы который можно получать с формы
    private $fields = [
        'title',
        'slug',
        'type_id',
        'description',
        'content',
        'category_id',
        'thumbnail'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //пагинация категории
        //параметры пагинации для нумерации записей постранично с заданным шагом
        $page = [
            'step' => 10,
            'num' => $request->get('page')
        ];

    //связи реализованы в модели с категориям и типом
        $posts = Post::with('category','type')->paginate($page['step']);
//        возвращаем вид и передаем связанные категории и типы - это уже определено в моделях
        return view('admin.posts.index',compact('posts','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        //получаем все категории для постов
        $categories = Category::pluck('title','id')->all();
        //получаем все типы статей
        $types = Type::pluck('title','id')->all();
        //dd($categories);
        //возвращает форму для создания
        return view('admin.posts.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request) {

        //берем с запроса форма только поля
        $data = $request->only($this->fields);

        $data['slug'] = str_slug($data['slug']);

        $nameFolder = Category::find($data['category_id'])->title;




        //загрузка изображения
        $data['thumbnail'] = $this->uploadImage($request, str_slug($nameFolder));

        Post::create($data);

        return redirect()->route('posts.index')->with('success','Пост добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

       $this->error404($id);
        //получаем все категории для поста
        $categories = Category::pluck('title','id')->all();

        //получаем все типы статьи
        $types = Type::pluck('title','id')->all();

        $post = Post::find($id);

        //dd($post->category->title);
        return view('admin.posts.edit',compact('post', 'categories', 'types'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $this->error404($id);
        //берем с запроса формы только поля
        $data = $request->only($this->fields);
        $data['slug'] = str_slug($data['slug']);

        $post = Post::find($id);

        if($request->input('save') == 'Отмена')   {
            return redirect()->route('posts.index');
        }

        //Проверяем пришло ли изображение

    $data['thumbnail'] = $this->uploadImage($request, str_slug($post->category->title), $post->thumbnail);


//        не удалять картинк из базы если она не прислана формой
        if($data["thumbnail"] == null) {
            $data["thumbnail"] = $post->thumbnail;
        }




        //обновляем запись
        $post->update($data);

        if ($request->input('save') == 'Сохранить и закрыть') {
            return redirect()->route('posts.index')->with('success',('Пост обновлен'));
        }

        $categories = Category::pluck('title','id')->all();
        //получаем все типы статьи
        $types = Type::pluck('title','id')->all();

        return redirect()->route('posts.edit',compact('post', 'categories', 'types'))->with('success','Пост обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $this->error404($id);

        $post = Post::find($id);
        //удаляем изображения с хостинга
        Storage::delete($post->thumbnail);


        $post->delete($id);
        return redirect()->route('posts.index')->with('success','Статья удалена');

    }

    //возвращает 404 ошибку
    private function error404($id) {
        if(!Post::find($id)) {
            abort(404, "<h2>404 - ошибка!</h2> <p><b>Поста с id:</b><br />$id<br />не существует!</p>");
        }
    }

    //загрузка изображений
    private function uploadImage(StorePost $request, $nameFolder, $imageDel = null) {


        if ($request->hasFile('thumbnail')) {

            //создаем оригинальное имя файла
            $nameFile = $request->file('thumbnail')->getClientOriginalName();
            $fullNameImg = "images/{$nameFolder}/{$nameFile}";

            if($fullNameImg != $imageDel) {

               //$image - это путь к файлу в базе
               if ($imageDel) {
                   //удаляем старый файл
                   Storage::delete($imageDel);
               }

                //возвращает в базу строку и записывает файл
               return $request->file('thumbnail')->storeAs("images/{$nameFolder}",$nameFile);

           }
            $request->session()->flash('danger', 'Изображение не обновлено, т.к. с таким именем уже существует');
            return null;
        }

        return null;

    }


    public function delImg(Request $request, $id) {

        $this->error404($id);

        $post = Post::find($id);
        //удаляем изображения с хостинга


        Storage::delete($post->thumbnail);

        $data['thumbnail'] = null;
        $post->update($data);
        $request->session()->flash('success', 'Изображение удалено с хостинга');
        return back();




    }




}
