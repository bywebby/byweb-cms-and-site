{{--наследуем главный шаблон--}}
@extends('byweb.html.index')



{{-- модуль гланый текст --}}
@section('top-contents')

    <div id="navigation" role="navigation">
        <div class="row-container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <section class="moduletable mainotstup span12" style="text-align: center; padding: 50px 0 50px">


                                        {!!  $exception->getMessage() !!}


                    </section>
                </div>
            </div>
        </div>
    </div>



@endsection

