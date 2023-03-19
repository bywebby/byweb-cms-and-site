<section class="row polosa">
    <div class='flex'>
@foreach($items as $item)
            <div class='item-4 green py-30 px-10'>
                <p><strong>{{ $item->title }}</strong></p>
                {!! $item->content !!}
            </div>
@endforeach

    </div>
</section>
