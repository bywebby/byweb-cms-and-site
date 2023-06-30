{{--наследуем главный шаблон--}}
@extends('byweb.html.index')


@section('top-contents')

    <div class="container">
        <div class="center">
{{--            сохраняет скрин на диск--}}
{{--            <img src="{{asset('uploads/images/cards/'.$slug.'.jpg')}}" alt="">--}}
{{--            закодированный скрин без сохранения на диск--}}
            <img src="data:image/png;base64,{{$img}}" alt="">
        </div>



        <div class="center white py-30">
            {{--            сохраняет скрин на диск--}}
{{--            <a class="btn btn-primary center white " href="{{asset('uploads/images/cards/'.$slug.'.jpg')}}">Скачать</a>--}}
            <a class="btn btn-primary center white " href="data:image/png;base64,{{$img}}">Скачать</a>

        </div>
    </div>




@endsection
