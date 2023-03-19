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
                         <div class="card-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Создать категорию</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action=" {{ route('categories.store') }}">

                                        @csrf

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Заголовок категории</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок категории" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Алиас категории</label>
                                                <input type="text" name="slug" class="form-control @error('slug') is-valid @enderror" placeholder="Алиас категории" value="{{ old('slug') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_title">Мета заголовок</label>
                                                <input type="text" name="meta_title" class="form-control @error('meta_title') is-valid @enderror" placeholder="Мета заголовок" value="{{ old('meta_title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_desc">Мета описание</label>
                                                <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-valid @enderror" placeholder="Мета описание" value="{{ old('meta_desc') }}">
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
