@if($data != [])
    <div class="container center">
        <div class="breadcrumbs">
            Вы здесь:

            @foreach($data as $k => $i)

                @if($i == '/')
                    <a href="{{$i}}"><i class="fa fa-house"></i></a> |
                @elseif($i == 'uslugi')
                    {{$k}} |
                @else
{{--                    <a href="{{$i}}">{{$k}}</a>--}}
                   {{$k}}
                @endif

            @endforeach
        </div>
    </div>
@endif


