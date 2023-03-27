@extends('admin.html.index')
@section('title','Создать тип статьи')

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
                                        <h3 class="card-title">Создать модуль</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action=" {{ route('modules.store') }}">

                                        @csrf

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Заголовок модуля</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок модуля" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Описание модуля</label>
                                                <textarea name="desc" id="content" cols="30" rows="10" class="form-control @error('desc') is-valid @enderror" placeholder="Заголовок модуля">{{ old('desc') }}</textarea>
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


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
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
