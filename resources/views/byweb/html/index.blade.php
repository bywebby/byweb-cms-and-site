<!DOCTYPE html>
{{--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token for VUE form-->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>
    <link href="{{ URL::current() }}" rel="canonical"/>

    <link href="{{ asset("tpl/byweb/css/template.css") }}" rel="stylesheet" type="text/css"/>
{{--    анимация AOS стили--}}
    <link href="{{  asset("tpl/byweb/css/aos.css") }}" rel="stylesheet" type="text/css"/>
{{--    иконки --}}
    <link href="{{  asset("tpl/byweb/css/all.css") }}" rel="stylesheet" type="text/css"/>


</head>

<body>

{{--id = app для vue--}}
<div id="app">
    {{-- выводим топ-панель --}}
    @include('byweb.html.layouts.sup-top')


{{--    @yield('menu')--}}
    @include('byweb.html.layouts.contents.menu.index')

    {{-- вывыодим слайдер --}}
    @yield('slider')
    {{-- вывыодим полосу --}}
    @yield('polosa')

{{--хлебыне крошки для 2 уровневых ссылок--}}
    @yield('breadcrumbs')

    {{-- верхний контент --}}
    @yield('top-contents')
    {{--почему мы--}}
    @yield('why-us')
    {{--галерея--}}
    @yield('gallery')
    {{--    цены --}}
    @yield('ceny')
    {{--   блок под ценами --}}
    @yield('under-price')
    {{--   блок над отзывами  --}}

    {{--  этапы'  --}}
    @yield('etapy')

    @yield('before-reviews')
    {{--   блок с отзывами  --}}
    @yield('reviews')
    {{--   подвал сайта  --}}
    @yield('footer')

    {{-- выводим топ-панель --}}
{{--    <div class="footer-contacts">--}}
        @include('byweb.html.layouts.sup-top')
{{--    </div>--}}

    {{--кнопка подъема сайта компонент на vue--}}
    <byweb-back-top/>

</div>

{{--анимация--}}
<script src="{{ asset('tpl/byweb/js/aos.js') }}" type="text/javascript"></script>
{{--vue js--}}
<script src="{{ asset('tpl/byweb/js/app.js') }}" type="text/javascript"></script>

{{--инициализация и всякие мелочи--}}
<script type="text/javascript">
    //инициализация aos
    AOS.init();

    //залипание меню
    window.onscroll = function () {
        myFixMenu("#nav");

    }

    //залипание верхнего меню
    function myFixMenu(myclass = '') {
        let navbar = document.querySelector(myclass);
        let sticky = navbar.offsetTop;

        if (window.pageYOffset > sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
    //конец залипание верхнего меню

    // бургер меню по кликуgetElementById('nav-menu')
    // let burgerMenu = document.getElementById('menu-burger-button');
    // burgerMenu.onclick = function () {
    //     let menuList = document.querySelector('.menu-list');
    //     //добавляет класс open-menu
    //     menuList.classList.toggle('open-menu');
    // };
    // конец бургер меню


</script>

</body>
</html>
