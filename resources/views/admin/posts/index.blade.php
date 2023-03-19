@extends('admin.html.index')
@section('title','Список статей')


@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Статьи</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
                                    Создать статью
                                </a>

                                @if (count($posts))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Наименование статьи</th>
                                                <th>Алиас статьи</th>
                                                <th>Категория статьи</th>
                                                <th>Тип статьи</th>
                                                <th>Управление категориями</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $k => $post)
                                                <tr>

{{--                                                    <td>{{ $post->id }}</td>--}}

                                                    {{--считает количество элементов--}}
                                                    @if($page['num'] == 1 || $page['num'] == null)
                                                        <td>{{ ++$k }}</td>
                                                    @else
                                                        <td>{{ (++$k)+($page['num']-1)*$page['step'] }}</td>
                                                    @endif
                                                    {{--конец подсчета количество элементов--}}



                                                    <td><a href="{{ route('posts.edit', ['posts' => $post->id])}}">{{ $post->title }} </a></td>
                                                    <td>{{ $post->slug }}</td>
                                                    <td>{{ $post->category->title }}</td>
                                                    <td>{{ $post->type->title }}</td>
                                                    <td>
{{--                                                        <a href="{{ route('posts.edit', ['posts' => $post->id]) }}" class="btn btn-info btn-sm float-left mr-1" title="Изменить пост">--}}
{{--                                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                                        </a>--}}
                                                        <form action="{{ route('posts.destroy', ['posts' => $post->id]) }}" method="post" class="float-left">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Удаление поста"
                                                                    onclick="return confirm('Подтвердите удаление поста')">
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
                                {{ $posts->links() }}
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
