@extends('admin.html.index')
@section('title','Список модулей')

@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Типы модулей</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">
                                    Создать модуль
                                </a>

                                @if (count($modules))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">




                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование</th>
                                                <th>Категория</th>
                                                <th>Тип статьи</th>
                                                <th>Панель управления</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($modules as $k => $module)
                                                <tr>

{{--                                                    считает количество элементов--}}
                                                    @if($page['num'] == 1 || $page['num'] == null)
                                                        <td>{{ ++$k }}</td>
                                                    @else
                                                        <td>{{ (++$k)+($page['num']-1)*$page['step'] }}</td>
                                                    @endif
{{--                                                    конец подсчета количество элементов--}}

                                                    <td><a href="{{ route('modules.edit', ['module' => $module->id]) }}" title="Обновить модуль">{{ $module->title }}</a></td>
                                                    <td><a href="{{ route('categories.edit', ['category' => $module->categories->id ]) }}" title="Перейти в категорию">{{ $module->categories->title }}</a></td>
                                                    <td><a href="{{ route('types-posts.edit', ['types_post' => $module->types->id ]) }}" title="Перейти в тип статьи">{{ $module->types->title }}</a></td>

                                                    <td>

{{--                                                        <a href="{{ route('modules.edit', ['module' => $module->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить тип модуля">--}}
{{--                                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                                        </a>--}}

                                                        <form action="{{ route('modules.destroy', ['module' => $module->id]) }}" method="post" class="float-left">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Удаления модуля"
                                                                    onclick="return confirm('Подтвердите удаление модуля')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="alert-danger p-2 text-center text-uppercase">Модули еще не созданы...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $modules->links() }}
                                <p>Всего записей: {{$modules->total()}} </p>



                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

