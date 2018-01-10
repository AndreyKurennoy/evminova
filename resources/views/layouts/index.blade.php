<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title> Одесский центр Евминова. Лечение искривления позвоночника. Доска (профилактор) Евминова</title>
    <meta name="description" content="Центр Евминова Одесса – лечение заболеваний позвоночника по методики Евминова. Успех лечение обеспечивается комплексным подходом. Искривление позвоночника или остеохондроз мы справимся с любым заболеванием.">
    <meta name="keywords" content="центр Евминова, лечение позвоночника, искривление, Евминов, Одесса">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{--<link rel="stylesheet" href="/css/header/style.css" />--}}{{-- ХЗ почему путь не видит--}}

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
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/streamline-small/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/streamline-large/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/template/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/header/fonts/social/styles.css">
    <link rel="stylesheet" type="text/css" href="/plugins/lightbox/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="/css/colorbox.css">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--js-->
    <script type="text/javascript" src="js/slider/jquery-1.11.3.min.js"></script>
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
        @yield('content')
    </div>


    <script>    var BASE_URL = "{{ url('/') }}" </script>
    @include('layouts.footer')

    </div>
</body>
</html>