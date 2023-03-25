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

{{--    {{ dump($item->type->title) }}--}}

    @switch($item->type->title)
    {{--    тип контента слайдер--}}
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
                @include('byweb.html.layouts.contents.content-1', ['item' => $item])
            @endsection
        @break

    @endswitch

@endforeach

    {{-- модуль полоса --}}
                @section('polosa')
                    @include('byweb.modules.polosa', ['items' => $itemsPolosa])
                @endsection
{{-- конец модуль полоса --}}



