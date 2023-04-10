@extends('admin.html.index')
@section('title','Создать категорию калькулятора')
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
                                        <h3 class="card-title">Создать категорию калькулятора</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.category.store') }}">
                                        @csrf

                                        <div class="p-3">
                                            <x-input label='Заголовок категории' name="title"/>
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
