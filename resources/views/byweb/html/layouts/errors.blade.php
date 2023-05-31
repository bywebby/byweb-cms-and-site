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

    @if (session()->has('success') || session()->has('danger') || session()->has('error'))
         <div class="container">
            <div class="row">
                <div class="col12">

                    @if( session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        @if( session('danger') )
                            <p class="alert-danger p-2 text-center text-uppercase">
                                {!!  session('danger')  !!}
                            </p>
                        @endif

                        @if( session('error') )
                            <p class="alert-danger p-2 text-center text-uppercase">
                                {!!  session('error')  !!}
                            </p>
                        @endif



                </div>
            </div>
         </div>
    @endif


