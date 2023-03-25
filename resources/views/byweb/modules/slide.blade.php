<div id='slider'>

    <div @if($item->thumbnail) class='slider-img' style="background: url('{!! asset('uploads/'.$item->thumbnail)  !!}') no-repeat; background-size: cover;"@endif>
    </div>

    <div class="container ">


        <div class='slider-item'>
            <div class='slider-item-txt'>
                 <h1>{{$item->title}}</h1>
                    {!! $item->content !!}
            </div>
        </div>

    </div>



</div>


