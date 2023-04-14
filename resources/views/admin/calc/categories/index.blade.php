@extends('admin.html.index')
@section('title','Все категории')


@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Все модули</h3>
                            </div>
                            <div class="card-body">
                                <x-btn-create route="calc.category.create" title="Создать категорию" />
                                @if (count($data))
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

                                            @foreach($data as $k => $item)
                                                <tr>

                                                    <td>
                                                        @include('admin.html.layouts.table.count-item',['page'=> $page])
                                                    </td>

                                                    <td>
                                                        <a href="{{route('calc.category.edit', ['category' => $item->id])}}">{{ $item->title }}</a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('calc.category.edit', ['category' => $item->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить категорию">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('calc.category.destroy', ['category' => $item->id]) }}" method="post" class="float-left">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Удаление категории"
                                                                    onclick="return confirm('Подтвердите удаление')">
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
                                    <p>Модулей пока нет...</p>
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
