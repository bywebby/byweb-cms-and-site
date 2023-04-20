@extends('admin.html.index')
@section('title','Все блоки')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Все блоки</h3>
                            </div>
                            <div class="card-body">
                                <x-btn route="calc.item.create" title="Создать блок" />
                                @if (count($data))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование блока</th>
                                                <th>Цена</th>
                                                <th>Наименование категория блока</th>
                                                <th>Наименование модуль блока</th>

                                                <th>Управление категориями</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($data as $k => $item)
                                                <tr>
                                                    {{--нумерует количества записей --}}
                                                    <td>
                                                        @include('admin.html.layouts.table.count-item',['page'=> $page])
                                                    </td>
                                                    {{-- конец нумерации количества записей--}}

                                                    <td {!!  $item->status == 0 ? 'class="bg-danger" title="Подвид не опубликован"' : ''!!}>
                                                        <a href="{{route('calc.item.edit', ['item' => $item->id])}}">{{ $item->calcTitle->title }}</a>
                                                    </td>

                                                    <td>
                                                        {{ $item->price }}
                                                    </td>

                                                    <td>
                                                        {{ $item->calcCategory->title }}
                                                    </td>

                                                    <td>
                                                        {{ $item->calcModule->title }}
                                                    </td>



                                                    <td>
                                                        <a href="{{ route('calc.item.edit', ['item' => $item->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить категорию">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('calc.item.destroy', ['item' => $item->id]) }}" method="post" class="float-left">

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
                                    <p>Блоков пока нет...</p>
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
