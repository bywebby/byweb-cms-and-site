@extends('admin.html.index')
@section('title','Список категорий')


@section('content')
    <div class="content-wrapper">



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Категории</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                                    Создать категорию
                                </a>

                                @if (count($categories))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование категории</th>
                                                <th>Алиас категории</th>
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
                                                    <td>{{ $category->title }}</td>
                                                    <td>{{ $category->slug }}</td>

                                                    <td>

                                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить категорию">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" class="float-left">

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
                                {{--<ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>--}}
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
