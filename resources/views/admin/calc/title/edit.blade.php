@extends('admin.html.index')
@section('title','Создать категорию услуги')
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
                                        <h3 class="card-title">Изменить категорию товара</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.title.update', ['title' => $data->id]) }}">

                                       @csrf
                                        @method('PUT')

                                        <div class="card-body">
{{--                                            <div class="form-group">--}}
{{--                                                <label for="title">Заголовок категории</label>--}}
{{--                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок категории" value="{{ old('title', $data->title) }}">--}}
{{--                                            </div>--}}

                                            <x-input label='Заголовок составной части услуги' name="title" :myData="$data" />
                                            <x-select-category title="Выберите класс" name="calc_classes_id"
                                                               :datacategory="$calcClasses" :myData="$data" />
                                            <x-select-category title="Выберите тип поля" name="calc_type_id"
                                                               :datacategory="$calcTypes" :myData="$data"/>



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
