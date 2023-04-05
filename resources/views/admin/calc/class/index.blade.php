@extends('admin.html.index')
@section('title','Справочник классов')

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Справочник классов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
{{--                                <a href="{{ route('calc.class.create') }}" class="btn btn-primary mb-3">--}}
{{--                                    Создать класс--}}
{{--                                </a>--}}
                                <x-btn-create route="calc.class.create" title="Создать класс"></x-btn-create>

                                @if (count($data))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование класса</th>
                                                <th>Управление категориями</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($data as $k => $item)
                                                <tr>

                                                    {{--считает количество элементов--}}
                                                    @if($page['num'] == 1 || $page['num'] == null)
                                                        <td>{{ ++$k }}</td>
                                                    @else
                                                        <td>{{ (++$k)+($page['num']-1)*$page['step'] }}</td>
                                                    @endif
                                                    {{--конец подсчета количество элементов--}}
                                                    <td>
                                                        <a href="{{route('calc.class.edit', ['class' => $item->id])}}">{{ $item->title }}</a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('calc.class.edit', ['class' => $item->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить класс">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('calc.class.destroy', ['class' => $item->id]) }}" method="post" class="float-left">

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
                                    <p>Классов пока нет...</p>
                                @endif
                            </div>

                            <div class="card-footer clearfix">
                                {{ $data->links() }}
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
