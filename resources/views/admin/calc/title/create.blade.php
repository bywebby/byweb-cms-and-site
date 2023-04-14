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
                                        <h3 class="card-title">Создать категорию товара</h3>
                                    </div>
                                    <form method="post" action="{{ route('calc.title.store') }}">
                                        @csrf
                                        <div class="card-body">


                                            <x-input label='Заголовок подвида услуг' name="title" />
                                            <x-select-category title="Выберите класс" name="calc_classes_id"
                                                               :datacategory="$calcClasses" />
                                            <x-select-category title="Выберите тип" name="calc_type_id"
                                                               :datacategory="$calcTypes" />


                                        </div>





                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                            <x-btn route="calc.title.index" title="Все подвиды" btn-class="btn btn-danger ml-1" />
                                            <x-btn route="calc.class.create" title="Создать класс" btn-class="btn btn-danger ml-1" />
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
