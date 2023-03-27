@extends('admin.html.index')
@section('title','Обновить тип статьи')



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
                                        <h3 class="card-title">Обновить тип статьи</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action=" {{ route('types-posts.update',['types_post' => $type->id]) }}">

                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Заголовок типа статьи</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок тип статьи" value="{{ $type->title }}">
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
