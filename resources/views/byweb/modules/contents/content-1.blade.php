{{--top-contents--}}
<div id="navigation">
    <div class="row-container">
        <div class="container-fluid">
            <div class="row-fluid">
                <section class="moduletable mainotstup  span12">
                    <div class="module_container" itemscope itemtype="http://schema.org/Service" >
                            <div class="mod-article-single mod-article-single__mainotstup" >
                                <div class="item__module">
                                    <!-- Intro Image -->

                                    <figure data-aos="fade-right" data-aos-delay="300" class="item_img img-intro img-intro__left">
                                        <img itemprop="image" src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">
                                    </figure>

                                    <meta itemprop="name" content="{{$item->title}}" />
                                    <meta itemprop="serviceType" content="{{$item->title}}" />

                                    <!-- Intro Text -->

                                    <div data-aos="fade-left" data-aos-delay="300" itemprop="description" class="item_introtext">

                                        <h2>{{ $item->title }}</h2>

                                      {!! $item->content !!}

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>
