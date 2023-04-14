@extends('admin.html.index')
@section('title','Справочник типов')


@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Справочник типов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <x-btn-create route="calc.types.create" title="Создать тип" />
                                @if (count($types))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование типа</th>
                                                <th>Управление типами</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($types as $k => $type)
                                                <tr>
                                                    {{--нумерует количества записей --}}
                                                    <td>
                                                        @include('admin.html.layouts.table.count-item',['page'=> $page])
                                                    </td>
                                                    {{-- конец нумерации количества записей--}}
                                                    <td>
{{--                                                        <a href="{{route('calc.types.edit', ['type' => $type->id])}}">--}}
                                                            {{ $type->title }}
{{--                                                        </a>--}}
                                                    </td>

                                                    <td>
{{--                                                        <a href="{{ route('calc.types.edit', ['type' => $type->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить тип">--}}
{{--                                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                                        </a>--}}

                                                        <form action="{{ route('calc.types.destroy', ['type' => $type->id]) }}" method="post" class="float-left">

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
                                    <p>Типов пока нет...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $types->links() }}
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
