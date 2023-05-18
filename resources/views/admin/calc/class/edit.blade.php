@extends('admin.html.index')
@section('title','Обновить класс')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                         <div class="card-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Обновить класс для добавления иконки услуги/товара</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.class.update', ['class' => $data->id]) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Заголовок класса</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок класса" value="{{ old('title', $data->title) }}">
                                            </div>
                                        </div>

{{--                                        <div class="form-group mx-4">--}}
{{--                                            <label for="description">Код класса</label>--}}
{{--                                            <textarea name="description" id="description" class="form-control @error('description') is-valid @enderror" placeholder="Текст поста" rows="10">{{ old('description', $data->description) }}</textarea>--}}
{{--                                        </div>--}}

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                            </div>
                        </div>
                    </div>

                </div>
        </section>
    </div>
@endsection
