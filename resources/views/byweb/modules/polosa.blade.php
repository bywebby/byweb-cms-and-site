<section class="row ">
    <div class='polosa'>
@foreach($items as $item)
            <div class='polosa-item'>
                <h2>{{ $item->title }}</h2>
                {!! $item->content !!}
            </div>
@endforeach

    </div>
</section>
