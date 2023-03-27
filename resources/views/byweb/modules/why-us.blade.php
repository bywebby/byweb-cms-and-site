<div class="why-us py-50">

    <div class="container">

        <div class="why-us-desc center pb-30">
            <div class="why-us-header">
                <h2>{{ $module->title }}</h2>
            </div>


            <div class="why-us-txt">
                {!! $module->desc !!}
            </div>
        </div>


        <div class="why-us-items flex">
            @foreach($data as $item)
                @if($module->types->id == $item->type_id)

                    <div class="item-2">
                        <div class="why-us-item-header">
                            <h3 >{{ $item->title }}</h3>
                        </div>


                        <div class="why-us-desc-item">
                            {{ $item->description }}
                        </div>
                        <div class="why-us-cont-item" data-aos="fade-up-right" data-aos-delay="500" data-aos-once="false">
                            {!! $item->content !!}
                        </div>
                    </div>


                @endif
            @endforeach
        </div>
    </div>

    {{--{{dd($module->types->id)}}--}}

</div>


<i class="fa-brands fa-facebook"></i>




