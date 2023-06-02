<!DOCTYPE html>
{{--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>
    <link href="{{ URL::current() }}" rel="canonical"/>
    <link href="{{ asset("tpl/byweb/css/template.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{  asset("tpl/byweb/css/aos.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{  asset("tpl/byweb/css/all.css") }}" rel="stylesheet" type="text/css"/>


</head>

<body>


<div id="app">


        {{-- выводим топ-панель --}}
        @include('byweb.html.layouts.sup-top')
        {{-- Выводим меню --}}
        @include('byweb.html.layouts.menu')
        {{-- вывыодим слайдер --}}
        @yield('slider')
        {{-- вывыодим полосу --}}
        @yield('polosa')


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
    @yield('before-reviews')
    {{--   блок с отзывами  --}}
    @yield('reviews')
    {{--   подвал сайта  --}}
    @yield('footer')

    {{-- выводим топ-панель --}}
    @include('byweb.html.layouts.sup-top')

{{--кнопка подъема сайта--}}
{{--    <div id="back-top" style="display: block;">--}}
{{--        <a class='back-top-link' rel="nofollow" href="#">--}}
{{--            <i class="fa fa-angle-up"></i>--}}
{{--        </a>--}}
{{--    </div>--}}

    <byweb-back-top />


</div>

<script src="{{ asset('tpl/byweb/js/aos.js') }}" type="text/javascript"></script>
<script src="{{ asset('tpl/byweb/js/app.js') }}" type="text/javascript"></script>


<script type="text/javascript">
    //инициализация aos
    AOS.init();
    //залипание меню
    window.onscroll = function () {
        myFixMenu("#nav");

    }

    function myFixMenu(myclass = '') {

        let navbar = document.querySelector(myclass);
        let sticky = navbar.offsetTop;

        if (window.pageYOffset > sticky) {

            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }



    // бургер меню по кликуgetElementById('nav-menu')
    // let menuElem = document.getElementById('nav-menu');
    let burgerMenu = document.getElementById('menu-burger-button');

    burgerMenu.onclick = function() {
        let menuList= document.querySelector('.menu-list');
        //добавляет класс open-menu
        menuList.classList.toggle('open-menu');
    };



</script>

</body>
</html>
