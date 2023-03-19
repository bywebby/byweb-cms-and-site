<!DOCTYPE html>
{{--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
	<link href="{{ URL::current() }}" rel="canonical" />
	<link href="{{ asset("tpl/byweb/css/template.css") }}" rel="stylesheet" type="text/css" />

</head>

<body>


        {{-- выводим топ-панель --}}
        @include('byweb.html.layouts.sup-top')
        {{-- Выводим меню --}}
        @include('byweb.html.layouts.menu')
        {{-- вывыодим слайдер --}}
        @yield('slider')
        {{-- вывыодим полосу --}}
        @yield('polosa')








{{--<script src="{{ asset('tpl/byweb/js/mod_icemegamenu/menu.js') }}" type="text/javascript"></script>--}}








 </body>
</html>
