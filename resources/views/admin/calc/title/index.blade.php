@extends('admin.html.index')
@section('title','Справочник услуг')


@section('content')
    <div class="content-wrapper">



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Справочник услуг</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

{{--                                <a href="{{ route('calc.title.create') }}" class="btn btn-primary mb-3">--}}
{{--                                    Создать категорию--}}
{{--                                </a>--}}

                                <x-btn-create route="calc.title.create" title="Создать категорию"></x-btn-create>

                                @if (count($categories))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование категории</th>
                                                <th>Управление категориями</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($categories as $k => $category)
                                                <tr>

                                                    {{--считает количество элементов--}}
                                                    @if($page['num'] == 1 || $page['num'] == null)
                                                        <td>{{ ++$k }}</td>
                                                    @else
                                                        <td>{{ (++$k)+($page['num']-1)*$page['step'] }}</td>
                                                    @endif
                                                    {{--конец подсчета количество элементов--}}
                                                    <td>
                                                        <a href="{{route('calc.title.edit', ['title' => $category->id])}}">{{ $category->title }}</a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('calc.title.edit', ['title' => $category->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить категорию">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('calc.title.destroy', ['title' => $category->id]) }}" method="post" class="float-left">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Удаление категории"
                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                <i
                                                                    class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>Категорий пока нет...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $categories->links() }}
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
