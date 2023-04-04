@extends('admin.html.index')
@section('title','Создать категорию услуги')
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
                                        <h3 class="card-title">Создать категорию товара</h3>
                                    </div>
                                    <form method="post" action=" {{ route('calc.title.store') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Заголовок категории</label>
                                                <input type="text" name="title" class="form-control @error('title') is-valid @enderror" placeholder="Заголовок категории" value="{{ old('title') }}">
                                            </div>
                                        </div>
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
