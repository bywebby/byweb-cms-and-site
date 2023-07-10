<div class="top-tabbs py-50">
    <div class="container">
        <div class="how-we-work-desc center pb-30">
            <div class="how-we-work-header">
                <h2>{{ $module->title }}</h2>
            </div>
            <div class="how-we-work-txt">
                {!! $module->desc !!}
            </div>
        </div>

        <div class="how-we-work-items flex">
            @foreach($data as $item)
                @if($module->types->id == $item->type_id)

                            <div class="how-we-work-item center" >
                                <img src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">
                                <h3>{{ $item->title }}</h3>
                                <div>{!! $item->content !!}</div>
                            </div>


                @endif
            @endforeach
        </div>
    </div>



</div>






