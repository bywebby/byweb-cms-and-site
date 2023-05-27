<div class="reviews py-50">
    <div class="container">

        <div class="reviews-desc center pb-30">
            <div class="reviews-header">
                <h2>{{ $module->title }}</h2>
            </div>

            @if($module->desc)
                <div class="reviews-module-desc">
                    {!! $module->desc !!}
                </div>
            @endif

        </div>

        <div class="reviews-items flex">

            <ul id="review-list">
                @foreach($data as $item)
                    @if($module->types->id == $item->type_id and $item->thumbnail)
                        <li>
                            <div class="item-1 center">
                                @if($item->description)
                                    <a href="{{$item->description}}">
                                        <img class='reviews-img' src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">
                                    </a>
                                @else
                                    <img class='reviews-img' src="{{ asset('uploads/'.$item->thumbnail ) }}" alt="">
                                @endif

                                <div class="reviews-item-txt">
                                    {!! $item->content !!}
                                    <p class="review-header">{{ $item->title }}</p>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>
    {{--{{dd($module->types->id)}}--}}
</div>

