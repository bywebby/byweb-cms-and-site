<section class="row">
    <div class='polosa'>
@foreach($items as $item)

{{--    {{ dd($item) }}--}}

            <div class='polosa-item'>

                @if($item->description)

                    @php
                        $desc = explode('|', $item->description);
                    @endphp



                    <div class="polosa-item-i">

                            @if(isset($desc[1]))
                            <a href="{{$desc[1]}}"><i class='{{$desc[0]}}'></i></a>
                            @else
                            <i class='{{$desc[0]}}'></i>
                        @endif

                    </div>
                @endif

                <h2>{{ $item->title }}</h2>
                {!! $item->content !!}
            </div>
@endforeach

    </div>
</section>
