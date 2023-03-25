<div class="container">
    <section class="content-top py-50">
        <div class="content-top-item" itemscope itemtype="http://schema.org/Service">

            <meta itemprop="name" content="{{$item->title}}"/>
            <meta itemprop="serviceType" content="{{$item->title}}"/>

            <figure data-aos="fade-right" data-aos-delay="300" class="item_img img-intro img-intro__left">
                <img itemprop="image" src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="{{ $item->title }}">
            </figure>

            <div class="content-top-item-txt" itemprop="description" data-aos="fade-left" data-aos-delay="300">
                <h2>{{ $item->title }}</h2>
                {!! $item->content !!}
            </div>
        </div>
    </section>
</div>


