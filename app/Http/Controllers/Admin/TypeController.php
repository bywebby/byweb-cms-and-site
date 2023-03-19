<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Types\StoreType;

use App\Models\admin\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //параметры пагинации для нумерации записей постранично с заданным шагом
        $page = [
            'step' => 10,
            'num' => $request->get('page')
            ];

        $types = Type::paginate($page['step']);

       return view('admin.type-post.index',  compact('types','page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//возвращает форму для создания

        return view('admin.type-post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreType $request) {


        $data = $request->only('title');

        Type::create($data);
        return redirect()->route('types-posts.index')->with('success','Тип статьи сохранен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Type::find($id)) {
            $type = Type::find($id);
            return view('admin.type-post.edit',compact('type'));
        }
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
        if($request->input('save') == 'Отмена')   {
            return redirect()->route('types-posts.index');
        }

        if(Type::find($id)) {
            $type = Type::find($id);
            $type->update($request->all());
        }
        if ($request->input('save') == 'Сохранить и закрыть') {
            return redirect()->route('types-posts.index')->with('success','Тип статьи обновлен');
        }
        return redirect()->route('types-posts.edit',['type' => $type->id])->with('success','Тип статьи обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

//        Type::find($id)->delete();
//        return redirect()->route('types-posts.index')->with('success','Тип удален');

        $type = Type::find($id);
        if($type->posts->count() == 0) {
            Type::destroy($id);
            return redirect()->route('types-posts.index')->with('success','Тип удален');
        } else {
            return redirect()->route('types-posts.index')->with('danger', 'Тип не удален, т.к. содержит посты<br /> &ndash; удалите вначале посты для данного типа: '.$type->title);
        }



    }
}
