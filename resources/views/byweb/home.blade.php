{{--наследуем главный шаблон--}}
@extends('byweb.html.index')
{{--подставляем позиции в основной шаблон, что наследовали--}}
{{-- head параметры начало --}}
{{--   тайтл в head  --}}
@section('title', $data[0]->category->meta_title)
{{-- Дескрипшен в head --}}
@section('description', $data[0]->category->meta_desc)
{{-- head параметры конец--}}

{{-- Выводим меню --}}
{{--@section('menu')--}}
{{--    @include('byweb.html.layouts.contents.menu.index', ['items' => $menuitems])--}}
{{--@endsection--}}

{{--хлебные крошки--}}
@section('breadcrumbs')
    @include('byweb.modules.breadcrumbs', ['data' => $breadcrumbs])
@endsection
{{--конец хлебные крошки--}}

@foreach($data as $k => $item)
{{--           {{ dump($item->type->title) }}--}}

    @switch($item->type->title)
            {{--тип контента слайдер--}}
        @case('Слайдер')
            @section('slider')
                @include('byweb.modules.slide', ['item' => $item])

            @endsection
        @break
    {{--    тип контента верхняя панель top-menu--}}
         @case('Полоса')
            @php
                /** @var $item */
            // Добавляем в массив все item из типа контнета полоса
                    $itemsPolosa[] = $item;
            @endphp
        @break
        {{--    тип контента главная статья--}}
        @case('Главная статья')
            @section('top-contents')

{{--                {{dd($item)}}--}}

                @include('byweb.html.layouts.contents.content-1', ['item' => $item])
            @endsection
        @break

        @case('Галерея')
            @php
                /** @var $item */
            // Добавляем в массив все item из типа контнета полоса
                    $itemsGallery[] = $item->toArray();
            @endphp
        @break

        @case('Блок под ценами')
                @section('under-price')
                    @include('byweb.modules.under-price', ['item' => $item])
                @endsection
        @break

        {{--блок над отзывами как с нами работать--}}
{{--        @case('Блок над отзывами')--}}
{{--            @section('before-reviews')--}}
{{--                @php--}}
{{--                    /** @var $item */--}}
{{--                    // Добавляем в массив все item из типа контнета полоса--}}
{{--                    $itemsBeforeRevies[] = $item;--}}
{{--                @endphp--}}
{{--            @endsection--}}
{{--        @break--}}

            @case("Заголовок подвала")
                @section('footer')
                    @include('byweb.modules.footer', ['item' => $item])
                @endsection
        @break

    @endswitch

@endforeach

{{-- модули со многими статьями--}}
{{-- модуль полоса --}}
    @if(isset($itemsPolosa))
        @section('polosa')
            @include('byweb.modules.polosa', ['items' => $itemsPolosa])
        @endsection
    @endif
{{-- конец модуль полоса --}}

@if(isset($modules))
    @foreach($modules as $module)

{{--               {{ dump($module->types->title) }}--}}

       @switch($module->types->title)


            @case('Табы')
{{--                @section('top-tabs')--}}
{{--                    @include('byweb.modules.tabs.top-tabs', ['item' => $module, 'data' => $data])--}}
{{--                @endsection--}}
                @php
                    /** @var $module
                    *  @var $data
                    */
                               $moduleTabs = $module->toArray();

                  foreach ($data as $item) {
                                    /*Выборка всех отзывов из модуля по типу*/
                                   if($module->type_id == $item->type_id) {
                                        $itemsTabs[]  = $item->toArray();
                                    }
                                }

                @endphp


            @break


            @case('Этапы')
                @section('etapy')
                    @include('byweb.modules.etapy', ['item' => $module, 'data' => $data])
                @endsection
            @break

            @case('Почему мы')
                @section('why-us')

                    @include('byweb.modules.why-us', ['item' => $module, 'data' => $data])
                @endsection
            @break

            @case('Блок-над-отзывами')
                @section('before-reviews')
                    @include('byweb.modules.before-reviews', ['item' => $module, 'data' => $data])
                @endsection
            @break

            @case('Отзывы')
                    @php
                        /** @var $module
                        *  @var $data
                        */
                    // Добавляем в массивы все модули reviews и items reviews
                                $moduleReviews[] = $module->toArray();

                                foreach ($data as $item) {
                                    /*Выборка всех отзывов из модуля по типу*/
                                   if($module->type_id == $item->type_id) {
                                        $dataReviews[] = $item->toArray();
                                    }
                                }
                    @endphp
            @break



        @endswitch
    @endforeach
@endif
{{-- конец модулей со многими статьями --}}

{{--VUE компоненты --}}

{{-- модуль top-tabs --}}
@if( isset($itemsTabs) and isset($moduleTabs))

    {{--    {{dd($itemsGallery)}}--}}
    @section('top-tabs')


        {{--        json для передачи в компонет vue --}}
        <byweb-top-tabs items="{{json_encode($itemsTabs)}}" module="{{json_encode($moduleTabs)}}"></byweb-top-tabs>
    @endsection
@endif
{{-- конец модуль top-tabs --}}



{{-- модуль галерея --}}
@if( isset($itemsGallery) )

{{--    {{dd($itemsGallery)}}--}}
    @section('gallery')
        {{--        json для передачи в компонет vue --}}
        <byweb-gallery items="{{json_encode($itemsGallery)}}"></byweb-gallery>
    @endsection
@endif
{{-- конец модуль полоса --}}

{{-- модуль цены --}}



@if( !empty($calcItems))

{{--    {{dd($calcItems)}}--}}

    @section('ceny')
        {{--        @include('byweb.modules.ceny', ['calcItems' => $calcItems])--}}
        {{--vue компонент калькулятора--}}
        <byweb-ceny calcitems="{{json_encode($calcItems)}}"></byweb-ceny>

    @endsection
@endif
{{-- конец модуля цены --}}
{{-- модуль блока под калькулятором цен --}}

@if( isset($dataReviews) and isset($moduleReviews))
    @if( !empty($dataReviews) and !empty($moduleReviews))
{{--        {{dd($dataReviews, $moduleReviews)}}--}}
        @section('reviews')
            <byweb-reviews reviews="{{json_encode($dataReviews)}}" modules="{{json_encode($moduleReviews)}}"></byweb-reviews>
        @endsection
    @endif
@endif
{{--ENDD VUE компоненты--}}








