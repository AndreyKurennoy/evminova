<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{--<link rel="stylesheet" href="/css/header/style.css" />--}}{{-- ХЗ почему путь не видит--}}

    <link href='//fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/css/header/styles.css" />
    <link rel="stylesheet" type="text/css" href="/css/layout/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/superfish.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/jquery.qtip.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/style.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/animations.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/odometer-theme-default.css">

    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="/css/fonts/streamline-small/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/fonts/streamline-large/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/fonts/template/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/fonts/social/styles.css">
    <link rel="shortcut icon" href="images/favicon.ico">

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