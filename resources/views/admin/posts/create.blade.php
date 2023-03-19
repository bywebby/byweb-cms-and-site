@extends('admin.html.index')
@section('title','Создать пост')



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
                                        <h3 class="card-title">Создать пост</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">

                                        @csrf

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Заголовок поста</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок поста" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Алиас поста</label>
                                                <input type="text" name="slug" class="form-control @error('slug') is-valid @enderror" placeholder="Алиас поста" value="{{ old('slug') }}">
                                            </div>



                                            <div class="form-group">
                                                <label for="description">Краткое описание</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-valid @enderror" placeholder="Краткое описание" rows="3">{{ old('description') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Текст поста</label>
                                                <textarea name="content" id="content" class="form-control @error('content') is-valid @enderror" placeholder="Текст поста" rows="10">{{ old('content') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">Выберите категорию</label>
                                                <select name="category_id" class="form-control @error('category_id') is-valid @enderror" id="category_id">
                                                    @foreach($categories as $k => $v)
                                                        <option value="{{$k}}">{{$v}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="type_id">Типы поста</label>
                                                <select name="type_id" class="form-control @error('type_id') is-valid @enderror" id="category_id">

                                                    @foreach($types as $k => $v)
                                                        <option value="{{$k}}">{{$v}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="thumbnail">Картинка поста</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                                            <label class="custom-file-label" for="thumbnail">Выберите картинку</label>
                                                        </div>
                                                    </div>

                                            </div>



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
