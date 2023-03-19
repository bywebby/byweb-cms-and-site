@extends('admin.html.index')
@section('title','Редактирование постов')



@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                         <div class="card-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $post->title }}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('posts.update', ['post' => $post->id])}}" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Заголовок поста</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror"  value="{{ $post->title }}">
                                                @error('title')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Алиас поста</label>
                                                <input type="text" name="slug" class="form-control @error('slug') is-valid @enderror" value="{{ $post->slug }}">
                                                @error('slug')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div class="form-group">
                                                <label for="description">Краткое описание</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-valid @enderror" rows="3">{{ $post->description }}</textarea>
                                                @error('description')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Текст поста</label>
                                                <textarea name="content" id="content" class="form-control @error('content') is-valid @enderror" rows="10">{{ $post->content }}</textarea>
                                                @error('content')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">Выберите категорию</label>
                                                <select name="category_id" class="form-control @error('category_id') is-valid @enderror" id="category_id">
                                                    @foreach($categories as $k => $v)
                                                        <option value="{{$k}}" @if ($k == $post->category_id) selected @endif>{{$v}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="type_id">Типы поста</label>
                                                <select name="type_id" class="form-control @error('type_id') is-valid @enderror" id="category_id">

                                                    @foreach($types as $k => $v)
                                                        <option value="{{$k}}" @if ($k == $post->type_id) selected @endif>{{$v}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbnail">Картинка поста</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="thumbnail">Выберите картинку</label>
                                                            <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                                            @error('thumbnail')
                                                                <div style="color:red">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                            </div>

                                            @if ($post->thumbnail)
                                                <div>
                                                    <img src="{{ asset("uploads/$post->thumbnail") }}" width="500">
                                                </div>

                                                <a href="{{ route('posts.edit.delImg', ['post' => $post->id]) }}" onclick="return confirm('Подтвердите удаление')">Удалить изображение</a>
                                            @endif

                                        </div>
                                        <!-- /.card-body -->

                                        {{-- Кнопки поста --}}
                                        @include('admin.html.layouts.forms.buttons')


                                    </form>
                                </div>





                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

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
