<div class="row" id='slider'>



        <div class="slider-img">
            <img src="{{asset('uploads/'.$item->thumbnail)}}" alt="">
        </div>

        <div class='slider-txt'>
            <h1>{{$item->title}}</h1>
            {!! $item->content !!}
        </div>



</div>
