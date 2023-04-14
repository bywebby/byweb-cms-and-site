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

{{--                                            {{dd($data)}}--}}

                                            <x-input label='Заголовок подвида услуги' name="title" :myData="$data" />

                                            <x-select-category title="Выберите класс" name="calc_classes_id"
                                                               :datacategory="$calcClasses" :mydata="$data" />

                                            <x-select-category title="Выберите тип поля" name="calc_type_id"
                                                               :datacategory="$calcTypes" :mydata="$data"/>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                            <x-btn route="calc.title.index" title="Все подвиды" btnClass="btn btn-danger mx-1"/>
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
