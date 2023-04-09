@extends('admin.html.index')
@section('title','Изменить модуль')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Изменить модуль</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.modules.update', ['module' => $data->id]) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Заголовок модуля</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок модуля" value="{{ old('module', $data->title) }}">
                                            </div>
                                        </div>

                                        <div class="form-group mx-4">
                                            <label for="description">Описание модуля</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-valid @enderror" placeholder="Описание модуля" rows="10">{{ old('description', $data->description) }}</textarea>


{{--                                            {{dd($data)}}--}}

{{--                                            mydata сравнивает значение из базы для update, чтобы выделить текущей селект если есть в базе--}}

                                            <x-select-category title="Выберите категорию" name="category_id" :datacategory="$category" :mydata="$data" />

                                        </div>





                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                            </div>
                        </div>
                    </div>

                </div>
        </section>
    </div>
@endsection
