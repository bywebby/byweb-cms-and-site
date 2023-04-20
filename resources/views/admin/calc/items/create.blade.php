@extends('admin.html.index')
@section('title','Создать блок калькулятора')
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
                                        <h3 class="card-title">Создать блок калькулятора</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.item.store') }}">
                                        @csrf

                                        <div class="card-body">

                                            <x-select-category title="Выберите подвид услуг" name="calc_title_id"
                                                               :datacategory="$calcTitles" />

                                            <x-input label='Цена' name="price" />

                                            <x-textarea label='Описание' name="description" />

                                            <x-select-category title="Выберите модуль" name="calc_module_id"
                                                               :datacategory="$calcModules"/>

                                            <x-select-category title="Выберите категорию" name="calc_category_id"
                                                               :datacategory="$calcCategories"/>

                                            <x-input-checked name="checked" label="Укажите выбран или не выбран подвид в статус checked"  />
                                            <x-input-checked name="status" label="Укажите статус опубликован или нет" />


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
