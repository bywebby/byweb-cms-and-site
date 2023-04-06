<?php

namespace App\Http\Controllers\Admin\Calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Calc\Types\StoreType;
use App\Models\admin\calc\CalcType;

class TypesController extends Controller
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
        $types = CalcType::query()->paginate($page['step']);
        return view('admin.calc.types.index', compact('types', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calc.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreType $request)
    {
       $data = $request->only(['title']);

       CalcType::create($data);

       return redirect()->route('calc.types.index')->with(['success' => 'тип поля сохранен']);


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
     * @param  int  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {

        $data = CalcType::findOrFAIL($type);

        return view('admin.calc.types.edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $type
     * @return \Illuminate\Http\Response
     */
    public function update(StoreType $request, $type)
    {
        $data = $request->only('title');

//        $valid = CalcType::where('title', $data['title'])->get();
//
//
//dd($valid->isEmpty());
//
//        if(!$valid->isEmpty()) {
//            return redirect()->route('calc.types.edit', ['type' => $type])->with('danger','Такое поле уже существует');
//        }

        $myType = CalcType::findOrFail($type);

        if($myType->title != $data['title']) {
            $myType::where(['id' => $type])->update($data );
        } else {
            return redirect()->route('calc.types.edit', ['type' => $type])->with('danger','Значение типа поля как и старое');
        }

        return redirect()->route('calc.types.edit', ['type' => $type])->with('success','Тип обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        $data = CalcType::findOrFail($type);

        $data::destroy($type);

        return redirect()->route('calc.types.index')->with('success', 'Тип поля удален');
    }
}
