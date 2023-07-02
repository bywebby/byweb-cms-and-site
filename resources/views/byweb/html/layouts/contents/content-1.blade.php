<div class="container">
    <section class="content-top py-50">
        <div class="content-top-item" itemscope itemtype="http://schema.org/Service">

            <meta itemprop="name" content="{{$item->title}}"/>
            <meta itemprop="serviceType" content="{{$item->title}}"/>



{{--            data-aos="fade-left" data-aos-delay="300"--}}
            <div data-aos="fade-left" data-aos-delay="300" class="content-top-item-txt @if($item->slug) py-30 px-10 @endif" @if($item->slug) id='{{$item->slug}}' @endif itemprop="description" >

                @if($item->thumbnail)
                    {{--                data-aos="fade-right" data-aos-delay="300"--}}
                    <figure  data-aos="fade-right" data-aos-delay="300" class="item_img img-intro img-intro__left">
                        <img itemprop="image" src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="{{ $item->title }}">
                    </figure>
                @endif


                <h2>{{ $item->title }}</h2>
                {!! $item->content !!}
            </div>

{{--            {{dd($item->slug == 'kontakty-byweb')}}--}}


        </div>

        @if($item->slug == 'kontakty-byweb')
            <div class="center py-30">
                <a class='btn btn-primary' href="{{route('front.shot', ['slug' => $item->slug])}}">Сгенерировать визитку</a>
            </div>
        @endif
    </section>
</div>


