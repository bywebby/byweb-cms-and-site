{{--    выводит флэш ошибки из сессии --}}

{{--            вывыод ошибок валидации--}}
    @if ($errors->any())
        <div class="container">
            <div class="row">
                <div class="col12">
                        <div class="alert alert-danger list-unstyled mt-4 mb-0">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    @endif

{{--успешное добавление записи--}}

    @if (session()->has('success') || session()->has('danger'))
         <div class="container">
            <div class="row">
                <div class="col12">

                    @if( session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        @if( session('danger') )
                            <div class="alert alert-danger">
                                {!!  session('danger')  !!}
                            </div>
                        @endif



                </div>
            </div>
         </div>
    @endif


