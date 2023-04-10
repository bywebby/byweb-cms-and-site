@extends('admin.html.index')
@section('title','Изменить категорию калькулятора')
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
                                        <h3 class="card-title">Изменить категорию калькулятора</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.category.update', ['category' => $data->id]) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">
                                            <x-input label='Заголовок категории' name="title" :myData="$data"/>
                                            <x-select-category title="Выберите класс" name="calc_classes_id"
                                                               :datacategory="$calcClasses" :mydata="$data" />
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
