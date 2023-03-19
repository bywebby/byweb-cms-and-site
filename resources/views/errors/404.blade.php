{{--наследуем главный шаблон--}}
@extends('byweb.html.index')



{{-- модуль гланый текст --}}
@section('top-contents')


    <div class="error">

        <h2>{!!  $exception->getMessage() !!}</h2>
    </div>



@endsection

