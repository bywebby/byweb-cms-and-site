{{--наследуем главный шаблон--}}
@extends('byweb.html.index')
{{--подставляем позиции в основной шаблон, что наследовали--}}
    {{-- head параметры начало --}}
        {{--   тайтл в head  --}}
             @section('title', $data[0]->category->meta_title)
        {{-- Дескрипшен в head --}}
             @section('description', $data[0]->category->meta_desc)
    {{-- head параметры конец--}}

@foreach($data as $k => $item)

    @switch($item->type_id)
    {{--    тип контента слайдер--}}
        @case(1)
            @section('slider')
                @include('byweb.modules.slide', ['item' => $item])
            @endsection
        @break
    {{--    тип контента верхняя панель--}}
        @case(2)
            @php
            /** @var $item */
                $itemsPolosa[] = $item;
            @endphp
        @break

    @endswitch

@endforeach

    {{-- модуль полоса --}}
                @section('polosa')
                    @include('byweb.modules.polosa', ['items' => $itemsPolosa])
                @endsection
{{-- конец модуль полоса --}}



