@extends('layouts.index')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('content')
<div class="row">
    <div class="no-pad icon-boxes-1" >
        <div class="col-sm-3 col-xs-12 col-md-3 col-lg-3">
            <div class="icon-box-3 wow fadeInUp" data-wow-delay="0.2s" data-wow-offset="150">
                <div class="icon-boxwrap2"><i class="fa fa-map icon-box-back2"></i></div>
                <div class="icon-box2-title">Адрес</div>
                <p><span>г. Одесса, 65007,</span><br><span>ул. Богдана Хмельницкого, 24</span></p>
                </div>
        </div>
        <div class="col-sm-3 col-xs-12 col-md-3 col-lg-3">
            <div class="icon-box-3 notViewed wow fadeInUp" data-wow-delay="0.4s" data-wow-offset="150">
                <div class="icon-boxwrap2"><i class="fa fa-phone icon-box-back2"></i></div>
                <div class="icon-box2-title">Телефоны</div>
                <ul>
                    <li>Телефон: <span class="ibox-right-span call_phone_1  ya_1" >+7 (495) 432-53-90</span></li>
                    <li class="call_phone_hide"><span class="ibox-right-span call_phone_1  ya_1" >+7 (495) 432-53-90</span></li>
                    <li class="call_phone_hide"><span class="ibox-right-span call_phone_1  ya_1" >+7 (495) 432-53-90</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12 col-md-3 col-lg-3">
            <div class="icon-box-3 notViewed wow fadeInUp" data-wow-delay="0.6s" data-wow-offset="150">
                <div class="icon-boxwrap2"><i class="fa fa-street-view icon-box-back2"></i></div>
                <div class="icon-box2-title">Проезд</div>
                <p>Виртуальный тур по центру</p>
            </div>
        </div>
        <div class="col-sm-3 col-xs-12 col-md-3 col-lg-3">
            <div class="icon-box-3 notViewed wow fadeInUp" data-wow-delay="0.8s" data-wow-offset="150">
                <div class="icon-boxwrap2"><i class="fa fa-clock-o icon-box-back2"></i></div>
                <div class="icon-box2-title">Режим работы</div>
                <ul>
                    <li>Пн.-Пт. <span class="ibox-right-span">9.00  - 21.00</span></li>
                    <li>Сб. <span class="ibox-right-span">9.00  - 20.00</span></li>
                    <li>Вс. <span class="ibox-right-span">9.00 - 20.00</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="maps-box margin-bottom-30">
        <img src="http://evminov.com.ua/files/2.JPG" style="border:0px #000000;width:227px;height:265px;vertical-align:baseline">
        <img src="http://evminov.com.ua/files/img/Центр Евминова карта.jpg" style="border:0px #000000;width:474px;height:265px;vertical-align:baseline" title="Контакты одесского центра Евминова" alt="Контакты одесского центра Евминова">
    </div>
</div>
<div class="row full-width">
    <div class="contact-map margin-bottom-30" id="map" data-scroll-wheel="0" data-draggable="0">
        <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJd28cjIcxxkARRO8m9GXymzs&key=AIzaSyAAUAEfP75_KdlNVMt0tW7AvNVfsEvh5E8" allowfullscreen></iframe>
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript" src="//:maps.google.com/maps/api/js?key=AIzaSyA3M5-J-sq_BiMjltG8QLkNmajjoCFwm_8"></script>
@stop