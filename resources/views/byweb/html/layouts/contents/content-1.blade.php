<div class="container">
    <section class="content-top py-5 @if($item->description) {{$item->description}}@endif">
        <div class="content-top-item" itemscope itemtype="http://schema.org/Service">

            <meta itemprop="name" content="{{$item->title}}"/>
            <meta itemprop="serviceType" content="{{$item->title}}"/>


            {{--                           слаг нужен для генерации картинки в контактах--}}
            <div data-aos="fade-left" data-aos-delay="300"
                 class="content-top-item-txt @if($item->slug) py-30 px-10 @endif" @if($item->slug) id='{{$item->slug}}'
                 @endif itemprop="description">

                @if($item->thumbnail)
                    {{--                data-aos="fade-right" data-aos-delay="300"--}}
                    <figure data-aos="fade-right" data-aos-delay="300">
                        <img itemprop="image" src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="{{ $item->title }}">
                    </figure>
                @endif

                <div class="order0">
                    <h2>{{ $item->title }}</h2>
                    {!! $item->content !!}</div>
                </div>

            {{--            {{dd($item->slug == 'kontakty-byweb')}}--}}


        </div>

        @if($item->slug == 'kontakty-byweb')
            <div class="center py-30">
                <a class='btn btn-primary' href="{{route('front.shot', ['slug' => $item->slug])}}">Сгенерировать
                    визитку</a>
            </div>
        @endif
    </section>
</div>


