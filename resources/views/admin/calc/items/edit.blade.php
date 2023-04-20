@extends('admin.html.index')
@section('title','Обновить блок калькулятора')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card card-primary">

                                    <x-btn route="calc.item.index" title="Все блоки" />

                                    <div class="card-header">
                                        <h3 class="card-title">Обновление блока калькулятора</h3>
                                    </div>

                                    <form method="post" action=" {{ route('calc.item.update', ['item' => $data->id]) }}">

                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">
                                            <x-select-category title="Выберите подвид услуг" name="calc_title_id"
                                                               :datacategory="$calcTitles" :mydata="$data" />
                                            <x-input label='Цена' name="price" :myData="$data" />
                                            <x-textarea label='Описание' name="description" :myData="$data" />
                                            <x-select-category title="Выберите модуль" name="calc_module_id"
                                                               :datacategory="$calcModules" :mydata="$data" />
                                            <x-select-category title="Выберите категорию" name="calc_category_id"
                                                               :datacategory="$calcCategories" :mydata="$data" />

                                            <x-input-checked name="checked" label="Укажите выбран или не выбран подвид в статус checked" :checked="$data" />
                                            <x-input-checked name="status" label="Укажите статус опубликован или нет" :checked="$data" />
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
