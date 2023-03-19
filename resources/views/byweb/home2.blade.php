{{--наследуем главный шаблон--}}
@extends('byweb.html.index')

{{--подставляем позиции в основной шаблон, что наследовали--}}

    {{-- head параметры начало --}}
        {{--   тайтл в head  --}}
             @section('title','Создание сайтов в Минске цена | разработка сайта')
        {{-- Дескрипшен в head --}}
             @section('description','Разработка и создание сайтов ✅ в Минске ✅ под ключ. ☎️ Успейте заказать сайт по ⏩ сниженной цене -30%. ⌛ Опыт⭐ PHP ⭐ SEO с 2011г - работаем на результат.')
    {{-- head параметры конец--}}


    {{-- позиции модулей начало --}}
        {{-- модуль слайдер --}}
            @section('slider')
                @include('byweb.modules.slide')
            @endsection

        {{-- модуль полоса --}}
            @section('polosa')
                @include('byweb.modules.polosa')
            @endsection

        {{-- модуль гланый текст --}}
            @section('top-contents')
                @include('byweb.modules.contents.content-1')
            @endsection

        {{-- модуль почему мы --}}
            @section('why-us')
                @include('byweb.modules.why-us')
            @endsection

        {{-- модуль портфолио --}}
            @section('folio')
                @include('byweb.modules.folio.folio')
            @endsection

        {{-- модуль цен --}}
            @section('ceny')
                @include('byweb.modules.ceny')
            @endsection

        {{-- модуль текст под ценами  --}}
            @section('content-2')
                @include('byweb.modules.contents.content-2')
            @endsection

        {{-- модуль как заказать  --}}
            @section('content-3')
                @include('byweb.modules.contents.content-3')
            @endsection

        {{-- модуль отзывы  --}}
            @section('content-4')
                @include('byweb.modules.contents.content-4')
            @endsection
{{-- позиции модулей конец --}}
