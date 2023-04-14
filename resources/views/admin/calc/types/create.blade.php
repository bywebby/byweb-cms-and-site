@extends('admin.html.index')
@section('title','Создать тип поля')
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
                                        <h3 class="card-title">Создать тип поля - text/radio</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.types.store') }}">
                                        @csrf


                                        <div class="card-body">
{{--                                        <x-select-field title="Выберите тип поля" name="title" :datatype="['checkbox', 'radio','Без типа']" />--}}
                                            <x-input title="Создать тип поля" name="title" />

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                            </div>
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
