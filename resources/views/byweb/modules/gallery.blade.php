<div class="gallery">

    <script>
        // let dataGallery = { 0: {id: 5}, };
        let dataGallery = {};
    </script>


    @foreach($items as $k => $item)
{{--        {{dd($item)}}--}}
    @if($k < 5)
            <div class="gallery-item">

                <div class="gallery-item-img">

                    <img src="{{ asset('uploads/'.$item->thumbnail) }}" alt="{{ $item->title }}">

                    <div class="gallery-item-txt">

                        <div class="gallery-item-header">
                            <a href="{{ $item->description }}" rel="nofollow">{{ $item->title }}</a>
                        </div>

                        <div class="gallery-item-link">
                            <a href="{{ $item->description }}" rel="nofollow"><i class="fa-solid fa-link"></i></a>
                        </div>

                    </div>

                </div>

            </div>
        @else

            @php

                $jsItem[$k] = [
                        'title' => $item->title,
                        'description' => $item->description,
                        'thumbnail' => asset('uploads/'.$item->thumbnail)

                ];

            @endphp

        @endif

    @endforeach

{{--    {{dd($jsGall)}}--}}





    <div class="gallery-btn center">
        <a class='btn' id='btn-gallery'  href="#">Подгрузить еще</a>
    </div>



</div>




<script>

        dataGallery =  {!! json_encode($jsItem) !!};

    const button = document.querySelector('#btn-gallery');
    let gallery = document.querySelector('.gallery');

    // Навешиваем на кнопку обработчик клика
    button.onclick = function myGallery(evt) {
        // Отменяем переход по ссылке
        evt.preventDefault();

        for (var key in dataGallery) {

            // let obj = dataGallery[key];

            // console.log(obj.title);
            gallery.innerHTML = gallery.innerHTML + dataGallery[key].title + '<br />' + dataGallery[key].description;
        }


    };






</script>
