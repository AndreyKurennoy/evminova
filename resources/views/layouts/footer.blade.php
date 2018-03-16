<div class="row blue full-width padding-top-bottom-30">
    <div class="row">
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-phone">
                        <p>048 700-83-03</p>
                        <p>094 953-13-03</p>
                        <p>094 064-72-02</p>
                        <p>067 558-08-12</p>

                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-location">
                    <p>ул. Богдана Хмельницкого, 24<br>
                        МЦ "Оптикор" </p>
                </li>
            </ul>
        </div>
        <div class="column column-1-3">
            <ul class="contact-details-list">
                <li class="sl-small-mail">
                    <p>E-mail:<br>
                        <a href="mailto:kevin.smith@connect.com">evminov.com.ua@ukr.net</a></p>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row gray full-width page-padding-top padding-bottom-50">
    <div class="row row-4-4">
        <div class="column column-1-4">
            <h6 class="box-header">Услуги нашего центра</h6>
                <ul class="list margin-top-20 margin-bottom-5">
                    <li class="template-bullet">Профилактор Евминова</li>
                    <li class="template-bullet">ЛФК</li>
                    <li class="template-bullet">Кинезетерапия</li>
                    <li class="template-bullet">Коррекция позвоночника</li>
                    <li class="template-bullet">Мануальная терапия</li>
                    <li class="template-bullet">Лечебный массаж</li>
                    <li class="template-bullet">Массаж головы и лица</li>
                    <li class="template-bullet">Йога для позвоночника</li>
                    <li class="template-bullet">Тайские массажи</li>
                </ul>
            <a href="/catalog" rel=canonical  class="footer-look-all-articles">смотреть все</a>
        </div>
        <div class="column column-1-4">
            <h6 class="box-header">Какие заболевания лечим</h6>
            <ul class="list margin-top-20 margin-bottom-5">
                <li class="template-bullet">Сколиоз</li>
                <li class="template-bullet">Искривление позвоночника</li>
                <li class="template-bullet">Остеохондроз</li>
                <li class="template-bullet">Грыжа межпозвонковых дисков</li>
                <li class="template-bullet">Артрит</li>
                <li class="template-bullet">Артроз</li>
                <li class="template-bullet">Радикулит</li>
                <li class="template-bullet">Протрузии</li>
                <li class="template-bullet">Кифоза</li>
            </ul>
            <a href="/lechim" rel=canonical  class="footer-look-all-articles">смотреть все</a>
        </div>
        <div class="column column-1-4">
            <h6 class="box-header">Полезные новости</h6>
            <ul class="blog small margin-top-30">
                @foreach($footerNews as $article)
                    <li>
                        <a style="width: 90px;" href="/news/{{$article->slug}}" title="What a Difference a Few Months Make" class="post-image">
                            <img src="/storage/thumbs/{{$article->preview_img}}" alt="">
                        </a>
                        <div class="post-content">
                            <a href="/news/{{$article->slug}}" title="{{$article->header}}">{{$article->header}}</a>
                            <ul class="post-details">
                                <li class="date">{{$article->date}}</li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="column column-1-4">
            <h6 class="box-header">Перезвонить вам?</h6>
            <div class="footer-phone-me">
                <input type="text" class="footer-phone-me-input" placeholder="Имя*">
                <input type="text" class="footer-phone-me-input" placeholder="Телефон*">
                <div class="footer-phone-me-button">Перезвоните мне</div>
            </div>
            <ul class="social-icons yellow margin-top-26">
                <li>
                    <a target="_blank" rel="nofollow" href="https://www.facebook.com/EvminovOdessa" class="social-facebook" title="facebook"></a>
                </li>
                <li>
                    <a target="_blank" rel="nofollow" href="https://vk.com/evminov" class="socicon-vkontakte" title="vk"></a>
                </li>
                {{--<li>--}}
                    {{--<a target="_blank" rel="nofollow" href="http://themeforest.net/user/QuanticaLabs/portfolio?ref=QuanticaLabs" class="social-linkedin" title="linkedin"></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="https://pinterest.com/quanticalabs/" class="social-pinterest" title="pinterest"></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</div>





<!--js-->
<script type="text/javascript" src="{{ asset('js/slider/jquery-migrate-1.2.1.min.js')}}"></script>
@yield('scripts')
<script type="text/javascript" src="{{ asset('js/slider/jquery.ba-bbq.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery-ui-1.11.4.custom.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.ui.touch-punch.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.easing.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.touchSwipe.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.transit.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.hint.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.costCalculator.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.qtip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slider/jquery.blockUI.min.js')}}"></script>
{{--<script type="text/javascript" src="{{ asset('js/slider/main.js')}}"></script>--}}
{{--<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>--}}

<script type="text/javascript" src="{{ asset('plugins/lightbox/js/lightbox.js')}}"></script>
<script src="{{asset('/plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
