
{{--                        <img class="slide-img" src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">--}}



<div class="row" id='slider'>
    <div id='slider-item'>
        <div class='block'>
            <h1>{{$item->title}}</h1>
            {!! $item->content !!}
        </div>
    </div>
</div>
