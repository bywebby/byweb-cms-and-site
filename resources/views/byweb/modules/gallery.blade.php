
<byweb-gallery items="{{$items}}"></byweb-gallery>



{{--<!----}}
{{--<div class="gallery">--}}

{{--    @foreach($items as $k => $item)--}}
{{--        {{dd($item)}}--}}
{{--    @if($k < 0)--}}
{{--            <div class="gallery-item">--}}

{{--                <div class="gallery-item-img">--}}

{{--                    <img src="{{ asset('uploads/'.$item->thumbnail) }}" alt="{{ $item->title }}">--}}

{{--                    <div class="gallery-item-txt">--}}

{{--                        <div class="gallery-item-header">--}}
{{--                            <a href="{{ $item->description }}" rel="nofollow">{{ $item->title }}</a>--}}
{{--                        </div>--}}

{{--                        <div class="gallery-item-link">--}}
{{--                            <a href="{{ $item->description }}" rel="nofollow"><i class="fa-solid fa-link"></i></a>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        @else--}}
{{--формируем массив для создание js шаблона через json--}}
{{--            @php--}}
{{--                $jsItem[$k] = [--}}
{{--                        'title' => $item->title,--}}
{{--                        'description' => $item->description,--}}
{{--                        'thumbnail' => asset('uploads/'.$item->thumbnail),--}}
{{--                ];--}}
{{--            @endphp--}}

{{--        @endif--}}

{{--    @endforeach--}}

{{--</div>--}}

{{--<div class="gallery-btn center">--}}
{{--    <a class='btn' id='btn-gallery' href="#">Подгрузить еще</a>--}}
{{--</div>--}}


{{--<script>--}}

{{--        let dataGallery =  {!! json_encode($jsItem) !!};--}}

{{--        // console.log(dataGallery);--}}

{{--        let gallery = document.querySelector('.gallery');--}}

{{--        let button = document.querySelector('#btn-gallery');--}}
{{--        let counter = 0;--}}
{{--        let step = 3;--}}
{{--        button.addEventListener('click', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            counter += step; //5, 10, 15--}}

{{--            //определяем число эдементов в галлереи--}}
{{--            let countItem = Object.keys(dataGallery).length;--}}

{{--//здесь выводим элементы--}}
{{--            if (countItem) {--}}
{{--                // console.log(eqval);--}}
{{--                // console.log('%cШаг: ' +step + ' итого '+counter, 'color: red;');--}}
{{--                // console.log('%cПолучено число элементов в галереи: ' + countItem, 'color: red;');--}}
{{--                // console.log('объект :' + typeof dataGallery);--}}
{{--                //вывод элементов галереи--}}
{{--                for (let i = 0; i < step; i++) {--}}
{{--//получаем id обектов item gallery => return int 5, 6 etc.--}}
{{--                    let getKey = Object.keys(dataGallery)[i];--}}

{{--                    console.log('ключ :' + getKey);--}}

{{--                        if (getKey) {--}}

{{--                            const getTitle = dataGallery[getKey].title,--}}
{{--                            getUrl = dataGallery[getKey].description,--}}
{{--                            getImg = dataGallery[getKey].thumbnail,--}}
{{--                            setTemplateGallery = templateGalleryItem(getTitle, getImg, getUrl);--}}

{{--                            gallery.innerHTML += setTemplateGallery;--}}


{{--                            //удаляет объекты--}}
{{--                            delete dataGallery[getKey];--}}
{{--                            // dataGallery.splice(1,3);--}}
{{--                    }--}}

{{--                }--}}

{{--            }else {--}}

{{--                textBtn(text = 'Конец', idItem = 'btn-gallery');--}}
{{--            }--}}

{{--            console.log(countItem,  dataGallery);--}}

{{--        });--}}

{{--        function textBtn(text = 'Конец', idItem = 'btn-gallery') {--}}
{{--            document.getElementById(idItem).innerText = text;--}}
{{--        }--}}

{{--        function eqvalStepCountItm(counter, countItem) {--}}

{{--            if (counter == countItem) {--}}
{{--                textBtn('Конец', 'btn-gallery2');--}}
{{--                return false;--}}
{{--            } else  {--}}
{{--                return true;--}}
{{--            }--}}
{{--        }--}}

{{--      function templateGalleryItem(title, img, url) {--}}

{{--          return '<div class="gallery-item">'+--}}
{{--              '<div class="gallery-item-img">'+--}}
{{--              '<img src="' + img + '" alt="">'+--}}
{{--              '<div class="gallery-item-txt">'+--}}
{{--              '<div class="gallery-item-header">'+--}}
{{--              '<a href="' + url + '" rel="nofollow">' + title + '</a>'+--}}
{{--              '</div>'+--}}
{{--              '<div class="gallery-item-link">'+--}}
{{--              '<a href="' + url +'" rel="nofollow"><i class="fa-solid fa-link"></i></a>'+--}}
{{--              '</div>'+--}}
{{--              '</div>'+--}}
{{--              '</div>'+--}}
{{--              '</div>';--}}

{{--      }--}}


{{--</script>--}}
{{---->--}}
