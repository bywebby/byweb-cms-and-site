@extends('admin.html.index')
@section('title','Список типов статей')




@section('content')
    <div class="content-wrapper">



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Типы статей</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <a href="{{ route('types-posts.create') }}" class="btn btn-primary mb-3">
                                    Создать тип статьи
                                </a>

                                @if (count($types))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">




                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование</th>
                                                <th>Панель управления</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($types as $k => $type)
                                                <tr>

                                                    {{--считает количество элементов--}}
                                                    @if($page['num'] == 1 || $page['num'] == null)
                                                        <td>{{ ++$k }}</td>
                                                    @else
                                                        <td>{{ (++$k)+($page['num']-1)*$page['step'] }}</td>
                                                    @endif
                                                    {{--конец подсчета количество элементов--}}

                                                    <td>{{ $type->title }}</td>


                                                    <td>

                                                        <a href="{{ route('types-posts.edit', ['types_post' => $type->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить тип статьи">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('types-posts.destroy', ['types_post' => $type->id]) }}" method="post" class="float-left">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Удаление типа статьи"
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
                                    <p class="alert-danger p-2 text-center text-uppercase">Типы статей еще не созданы...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $types->links() }}
                                <p>Всего записей: {{$types->total()}} </p>



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

