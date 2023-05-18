@extends('admin.html.auth-admin')
@section('title','Авторизация в админ панеле Byweb')

@section('content')

    <!-- Main content -->
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">

                @include('admin.html.layouts.errors')
                <div class="card">
                    <div class="card-body register-card-body">
                        <div class="card-header">
                            <h3 class="text-center fw-bold">Админка ByWeb</h3>
                        </div>
                        <form action=" {{route('admin.auth') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-4 offset-8">
                                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
        </div>
    </div>

@endsection
