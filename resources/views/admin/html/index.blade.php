<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('tpl/admin/dist/css/template.css') }}">
    <!-- Theme style -->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin.html.layouts.navbar')
    @include('admin.html.layouts.sidebar')

    @include('admin.html.layouts.breadcump')


    @include('admin.html.layouts.errors')

    @yield('content')
    @include('admin.html.layouts.footer')
    @include('admin.html.layouts.conrol')



<!-- ./wrapper -->


<script src="{{ asset('tpl/admin/dist/js/tpl-scripts.js') }}"></script>

{{--скрипт для выпадания списка меню при наведении--}}
<script>

    //console.log($('.nav-sidebar a'));
    $('.nav-sidebar a').each(function(){
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(link == location){
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });
</script>


        <script src="{{ asset('plugins/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('plugins/ckfinder/ckfinder.js') }}"></script>

        <script>

            // import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting.js';

            if( document.querySelector( '#content' )) {

                ClassicEditor.create( document.querySelector( '#content' ), {

                    toolbar: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'blockQuote',
                            '|',
                            'fontSize',
                            'fontColor',
                            'fontBackgroundColor',
                            '|',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'mediaEmbed',
                            '|',
                            'undo',
                            'redo',
                            '|',
                            'insertTable',
                            '|',
                            'code',
                            'codeBlock',
                            'sourceEditing',
                            'htmlEmbed',
                            '|',
                            'CKFinder'
                        ]

                    }
                     )
                    .catch( error => {
                        console.error( error );
                    } );
            }



        </script>




</body>
</html>
