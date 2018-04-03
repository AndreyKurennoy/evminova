<div class="site-container">
    <div class="header-top-bar-container clearfix">
        <div class="header-top-bar">
            <ul class="contact-details clearfix">
                <li class="template-location">
                    Одесса, ул. Богдана Хмельницкого, 24
                </li>
                <li class="template-clock">
                    пн-сб: 10.00 - 18.00
                </li>
                <li class="template-mail">
                    <a href="mailto:evminov.com.ua@ukr.net">evminov.com.ua@ukr.net</a>
                </li>
                <li style="display: none;" class="template-custom">
                    Черноморский вертебрально-оздоровительный центр Евминова
                </li>
                <li class="template-phone">
                    <span>048 700-83-03</span><span>094 953-13-03</span><span>094 064-72-02</span>
                </li>
                <li class="call_me_tablet">
                    <a href="#">
                        <span class="call_me">
                            ПЕРЕЗВОНИТЕ МНЕ
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <a href="#" class="header-toggle template-arrow-up" style="display: none;"></a>
    </div>
    <div class="header-container">
        <!--<div class="header-container sticky">-->
        <div class="vertical-align-table" style="margin: auto;">
            <div class="header clearfix">

                <a href="#" class="mobile-menu-switch vertical-align-cell">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </a>
                <div class="menu-container clearfix vertical-align-cell">
                    <div class="container">
                        <div class="logo vertical-align-cell" style="z-index:99999;margin-top: -9px;display: -webkit-inline-box;">
                            <h1><a href="/" title="Renovate"><img src="/images/logo.png" alt=""></a></h1>
                        </div>
                    <nav style="width: -webkit-fill-available;">
                        <ul class="sf-menu">
                            <li>
                                <a rel="canonical" href="/about" title="О ЦЕНТРЕ">
                                    О ЦЕНТРЕ
                                </a>

                                <ul>
                                    <li>
                                        <a rel="canonical" href="/about/doctors" title="Доктора">
                                            Доктора
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="canonical" href="/certificates" title="Сертификаты">
                                            Сертификаты
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="canonical" href="/gallery" title="Фотографии">
                                            Фотографии
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="canonical" href="/guestbook" title="Отзывы">
                                            Отзывы
                                        </a>
                                    </li>
                                    @foreach($headerAbout as $item)
                                        @if($item->slug !== 'about')
                                            <li>
                                                <a rel="canonical" href="/about/{{$item->slug}}" title="{{$item->header}}">
                                                    {{$item->header}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a rel="canonical" href="/catalog" title="УСЛУГИ">
                                    УСЛУГИ
                                </a>
                                <ul>
                                    @foreach($headerCatalog as $item)
                                            <li>
                                                <a rel="canonical" href="/catalog/{{$item->slug}}" title="{{$item->header}}">
                                                    {{$item->header}}
                                                </a>
                                            </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a rel="canonical" href="/prices" title="ЦЕНЫ">
                                    ЦЕНЫ
                                </a>
                            </li>
                            <li>
                                <a rel="canonical" href="/lechim" title="ЧТО ЛЕЧИМ">
                                    ЧТО ЛЕЧИМ
                                </a>
                                <ul>
                                    @foreach($headerLechim as $item)
                                        <li>
                                            <a rel="canonical" href="/lechim/{{$item->slug}}" title="{{$item->header}}">
                                                {{$item->header}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a rel="canonical" href="/question" title="ПРОФИЛАКТОР">
                                    ПРОФИЛАКТОР
                                </a>
                                <ul>
                                    @foreach($headerProfilaktor as $item)
                                        @if($item->slug !== 'question')
                                        <li>
                                            <a rel="canonical" href="/question/{{$item->slug}}" title="{{$item->header}}">
                                                {{$item->header}}
                                            </a>
                                        </li>
                                        @endif()
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a rel="canonical" href="/news" title="СТАТЬИ">
                                    СТАТЬИ
                                </a>
                            </li>
                            <li>
                                <a rel="canonical" href="/contacts" title="КОНТАКТЫ">
                                    КОНТАКТЫ
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <span class="call_me_desktop">
                    <a href="#">
                            <span class="call_me">
                                ПЕРЕЗВОНИТЕ МНЕ
                            </span>
                    </a>
                    </span>
                    <span style="display:none;" class="phones-header">
                        <div>048 700-83-03</div>
                        <div>094 953-13-03</div>
                        <div>094 064-72-02</div>
                    </span>
                    </div>
                    <div class="mobile-menu-container">
                        <div class="mobile-menu-divider"></div>
                        <nav>
                            <ul class="mobile-menu collapsible-mobile-submenus">
                                <li>
                                    <a rel="canonical" href="/about" title="О ЦЕНТРЕ">
                                        О ЦЕНТРЕ
                                    </a>
                                    <a href="#" class="template-arrow-menu"></a>
                                    <ul>
                                        <li>
                                            <a rel="canonical" href="/about/doctors" title="Доктора">
                                                Доктора
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="canonical" href="/certificates" title="Сертификаты">
                                                Сертификаты
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="canonical" href="/gallery" title="Фотографии">
                                                Фотографии
                                            </a>
                                        </li>
                                        <li>
                                            <a rel="canonical" href="/guestbook" title="Отзывы">
                                                Отзывы
                                            </a>
                                        </li>
                                        @foreach($headerAbout as $item)
                                            @if($item->slug !== 'about')
                                                <li>
                                                    <a rel="canonical" href="/about/{{$item->slug}}" title="{{$item->header}}">
                                                        {{$item->header}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a rel="canonical" href="/catalog" title="УСЛУГИ">
                                        УСЛУГИ
                                    </a>
                                    <a href="#" class="template-arrow-menu"></a>
                                    <ul>
                                        @foreach($headerCatalog as $item)
                                            <li>
                                                <a rel="canonical" href="/catalog/{{$item->slug}}" title="{{$item->header}}">
                                                    {{$item->header}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a rel="canonical" href="/prices" title="ЦЕНЫ">
                                        ЦЕНЫ
                                    </a>
                                </li>
                                <li>
                                    <a rel="canonical" href="/lechim" title="ЧТО ЛЕЧИМ">
                                        ЧТО ЛЕЧИМ
                                    </a>
                                    <a href="#" class="template-arrow-menu"></a>
                                    <ul>
                                        @foreach($headerLechim as $item)
                                            <li>
                                                <a rel="canonical" href="/lechim/{{$item->slug}}" title="{{$item->header}}">
                                                    {{$item->header}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a rel="canonical" href="/question" title="ПРОФИЛАКТОР">
                                        ПРОФИЛАКТОР
                                    </a>
                                    <a href="#" class="template-arrow-menu"></a>
                                    <ul>
                                        @foreach($headerProfilaktor as $item)
                                            @if($item->slug !== 'question')
                                                <li>
                                                    <a rel="canonical" href="/question/{{$item->slug}}" title="{{$item->header}}">
                                                        {{$item->header}}
                                                    </a>
                                                </li>
                                            @endif()
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a rel="canonical" href="/news" title="СТАТЬИ">
                                        СТАТЬИ
                                    </a>
                                </li>
                                <li>
                                    <a rel="canonical" href="/contacts" title="КОНТАКТЫ">
                                        КОНТАКТЫ
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>