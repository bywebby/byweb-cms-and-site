@extends('admin.html.index')
@section('title','Создать модуль калькулятора')
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
                                        <h3 class="card-title">Создать модуль калькулятора</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.modules.store') }}">
                                        @csrf

                                        <div class="p-3">
                                            <x-input label='Заголовок' name="title"/>
                                            <x-textarea label="Краткое описание модуля" name="description"/>
                                            <x-select-category title="Выберите категорию" name="category_id"
                                                               :datacategory="$category"/>
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
