<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title>@if(isset($meta['title'])){{$meta['title']}}@endif</title>
    <meta name="description" content="@if(isset($meta['description'])){{$meta['description']}}@endif">
    <meta name="keywords" content="@if(isset($meta['keywords'])){{$meta['keywords']}}@endif">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--slider revolution-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/rs-plugin/css/settings.css')}}" media="screen" />
    <!--style-->
    {{--<link href='//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900' rel='stylesheet' type='text/css'>--}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/header/reset.css" />
    <link rel="stylesheet" href="/css/header/superfish.css" />
    <link rel="stylesheet" href="/css/header/prettyPhoto.css" />
    <link rel="stylesheet" href="/css/header/jquery.qtip.css" />
    <link rel="stylesheet" href="/css/header/style.css" />
    <link rel="stylesheet" href="/css/header/animations.css" />
    <link rel="stylesheet" href="/css/header/responsive.css" />
    <link rel="stylesheet" href="/css/header/odometer-theme-default.css" />

    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/socicon/style.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/streamline-small/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/streamline-large/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/template/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/social/styles.css">
    <link rel="stylesheet" type="text/css" href="/plugins/lightbox/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="/css/colorbox.css">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--js-->
    <script type="text/javascript" src="/js/slider/jquery-1.11.3.min.js"></script>
        {{--<script type="text/javascript" src=" {{ asset('/plugins/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>--}}
        {{--<script type="text/javascript" src="/plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>--}}

    @yield('head')
</head>
<body>
    <div class="site-container">

    @include('layouts.header')

    @yield('slider')

    <div id="content">
        @if(!Request::is('question') && !Request::is('/'))
        <div class="mob-prof">
            <a href="/question" rel="canonical">
            <img src="/images/mob_prof.png" alt="">
            <span>Заказать</span>
            <div>Доску Евминова</div>
            </a>
        </div>
        @endif
        @yield('content')
    </div>

        <a href="#top" class="scroll-top animated-element template-arrow-up fadeIn" title="Scroll to top" style="animation-duration: 600ms; animation-delay: 0ms; transition-delay: 0ms;"></a>
    <script>
        var BASE_URL = "{{ url('/') }}";
        $(document).ready(function(){
            var $document = $(document),
                $element = $('.header-top-bar-container'),
                className = 'box-shadow';

            $document.scroll(function() {
                $element.toggleClass(className, $document.scrollTop() >= 60);
            });
            $document.scroll(function() {
                $element.toggleClass('z-index-max-class', $document.scrollTop() >= 1);
            });
        });

        if ($(document).width() < 767){
            $('nav .sf-menu li a').one( 'click' ,function (e) {
                e.preventDefault();
            })
        }

    </script>
    @include('layouts.footer')

    </div>
</body>
</html>