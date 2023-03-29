<section class="row ">
    <div class='polosa'>
@foreach($items as $item)

{{--    {{ dd($item) }}--}}

            <div class='polosa-item'>
                @if($item->description)
                    <div class="polosa-item-i">
                        {!! $item->description !!}
                    </div>
            @endif

                <h2>{{ $item->title }}</h2>
                {!! $item->content !!}
            </div>
@endforeach

    </div>
</section>
