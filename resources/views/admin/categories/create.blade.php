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


                                            <div class="form-check pb-2">
                                                <input type="checkbox" name="landing" class="form-check-input " placeholder="Укажите landing или нет (добавляет к алиасу ссылки #)">
                                                <label class="form-check-label" for="checked">Укажите landing или нет (добавляет к алиасу ссылки #)</label>
                                            </div>




                                            <div class="form-group">
                                                <label for="parrent_id">Выберите категорию</label>
                                                <select name="parrent_id" class="form-control @error('parrent_id') is-valid @enderror" id="parrent_id">
                                                        <option value="0" selected >Без категории</option>

                                                    @if (!empty($cats))
                                                        {{--здесь ищет заголовок уже существующие категории по id --}}
                                                        @foreach($cats as $k => $v)
                                                                <option value="{{$v->id}}">{{$cats->find($v->id)->title}}</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="menu_type_id">Выберите тип кнопки в меню</label>
                                                <select name="menu_type_id" class="form-control @error('menu_type_id') is-valid @enderror" id="menu_type_id">


                                                    @if (!empty($menuTypes))
                                                        {{--здесь ищет заголовок уже существующие категории по id --}}
                                                        @foreach($menuTypes as $menuType)
                                                            <option value="{{$menuType->id}}" {{$menuType->id == 3 ? 'selected' : ''}}>{{$menuType->type}}</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_title">Мета заголовок (title)</label>
                                                <input type="text" name="meta_title" class="form-control @error('meta_title') is-valid @enderror" placeholder="Мета заголовок" value="{{ old('meta_title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_desc">Мета описание (description)</label>
                                                <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-valid @enderror" placeholder="Мета описание" value="{{ old('meta_desc') }}">
                                            </div>



                                            <div class="form-group">
                                                <label for="show">Показать в меню</label>
                                                <select name="show" class="form-control @error('show') is-valid @enderror" id="show">
                                                    <option value="1" selected >Показывать</option>
                                                    <option value="0">Не показывать</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="class">Укажите класс если есть</label>
                                                <input type="text" name="class" class="form-control @error('class') is-valid @enderror" placeholder="Укажите класс если есть" value="{{ old('class') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Выберите статус</label>
                                                <select name="status" class="form-control @error('status') is-valid @enderror" id="status">
                                                    <option value="1" selected >Опубликована</option>
                                                    <option value="0">Не опубликована</option>
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
