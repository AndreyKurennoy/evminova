@extends('layouts.index')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop
@section('scripts')
    {{--@if(isset($currentSheet) && !empty($currentSheet))--}}
    <script> var url = "{{route('saverating')}}"; var token = "{{ csrf_token() }}"; var slug = "{{request()->path()}}"; </script>
    <script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
    {{--@endif--}}
@stop
@section('slider')
    @include('layouts.slider')
@endsection

@section('content')
    <div class="row blue full-width padding-top-30 padding-bottom-17" id="health-features">
        <div class="row margin-bottom-20">
            <h3 class="header" style="text-align: center; color: #FFFFFF;">Центр Евминова - вернет здоровье вашему позвоночнику!</h3>
        </div>
        <div class="flex-features-container">
            <div class="health-feature">
                <div class="img">
                    <img src="/images/home/years.png" alt="">
                </div>
                <div class="health-feature-content">
                    <h5>Работаем с 2002 года</h5>
                    <p>За 15 лет работы мы помогли 4000 пациентам</p>
                </div>
            </div>
            <div class="health-feature">
                <div class="img">
                    <img src="/images/home/complex.png" alt="">
                </div>
                <div class="health-feature-content">
                    <h5>Комплексное лечение</h5>
                    <p>Используем безоперационные методы и минимум лекарств</p>
                </div>
            </div>
            <div class="health-feature">
                <div class="img">
                    <img src="/images/home/methodics.png" alt="">
                </div>
                <div class="health-feature-content">
                    <h5>Методика Евминова</h5>
                    <p>В лечении используем запатентованную методику Евминова</p>
                </div>
            </div>
            <div class="health-feature">
                <div class="img">
                    <img src="/images/home/doctors.png" alt="">
                </div>
                <div class="health-feature-content">
                    <h5>Квалифицированные врачи</h5>
                    <p>Опытные врачи с 20-летним стажем лечебной практики</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row margin-top-20 margin-bottom-30 troubles-block">
        <div class="row">
            <h3 class="box-header">С какими недугами справляются в центре Евминова?</h3>
        </div>
        <div class="flex-features-container margin-top-20">
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/90percent.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Устранение боли в спине</h4>
                    <p>90% пациентов отмечают значительное снижение боли и дискомфорта
                        благодаря курсу лечения по методике Евминова в нашем центре</p>
                </div>
            </div>
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/3.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Укрепление мышечного карсета</h4>
                    <p>Занятия на профилакторе Евминова эффективно и безопасно укрепляют глубокие мышцы спины,
                        что невозможно сделать на обычных фитнес-тренажерах.</p>
                </div>
            </div>
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/1.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Восстановление эластичности дисков</h4>
                    <p>Занятия по методике Евминова улучшают питание тканей межпозвоночных дисков,
                        восстанавливая их эластичность. Занятия способствуют уменьшению грыж в размере,
                        рубцеванию и заживлению поврежденных дисков.</p>
                </div>
            </div>
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/4.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Восстановление эластичности дисков</h4>
                    <p>Занятия на доске Евминова дают возможность в одних и тех же упражнениях для позвоночника давать
                        разную нагрузку для разных сторон тела и групп мышц, восстанавливая баланс.</p>
                </div>
            </div>
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/2.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Возвращаем радость движения</h4>
                    <p>Методика Евминова регулирует взаимодействие нервной системы и мышц, улучшая баланс и координацию движений.</p>
                </div>
            </div>
            <div class="flex-feature">
                <div class="img">
                    <img src="/images/home/5.png" alt="">
                </div>
                <div class="flex-feature-content">
                    <h4>Восстановление глубоких мышц спины</h4>
                    <p>Благодаря специализированным тренажерам для спины проблемные зоны изолируются и получают ровно столько нагрузки, сколько нужно для постепенного восстановления и укрепления глубоких мышц.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row margin-top-26">
        <h3 class="box-header margin-bottom-30">Популярные процедуры</h3>
        <div class="catalog-article description align-justify">
            {!!$options->where('option_name', 'text_1')->pluck('value')->first()!!}
        </div>
        <div class="flex-services-container">
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/lechebni-massage" title="Лечебный массаж">
                        <img src="images/home/procedures/massage.jpg" alt="Лечебный массаж">
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/kinezioterapia" title="Лечебный массаж">Лечебный массаж</a></h4>
            </div>
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/manual-terapi" title="Мануальная терапия">
                        <img src="images/home/procedures/manual-therapy.jpg" alt="Мануальная терапия">
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/manual-terapi" title="Мануальная терапия">Мануальная терапия</a></h4>
            </div>
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/korrekciya-i-lechenie-pozvonochnika-v-odesse" title="Коррекция позвоночника">
                        <img src="images/home/procedures/correction.jpg" alt="Коррекция позвоночника" >
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/korrekciya-i-lechenie-pozvonochnika-v-odesse" title="Коррекция позвоночника">Коррекция позвоночника</a></h4>
            </div>
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/lefk" title="ЛФК">
                        <img src="images/home/procedures/lfk.jpg" alt="ЛФК" >
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/lefk" title="ЛФК">ЛФК</a></h4>
            </div>
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/fizioterapi" title="Физиотерапия">
                        <img src="images/home/procedures/fiziotherapy.jpg" alt="Физиотерапия" >
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/fizioterapi" title="Физиотерапия">Физиотерапия</a></h4>
            </div>
            <div class="flex-service">
                <div class="img">
                    <a href="/catalog/kinezioterapia" title="Кинезитерапия">
                        <img src="images/home/procedures/kinezoterapia.jpg" alt="Кинезитерапия" >
                    </a>
                </div>
                <h4 class="box-header"><a href="/catalog/kinezioterapia" title="Кинезитерапия">Кинезитерапия</a></h4>
            </div>
        </div>
    </div>

    <div class="row  padding-top-bottom-30">
        <h3 class="box-header margin-bottom-30">Центр Евминова в Одессе - Ваш верный помощник в борьбе с недугами!</h3>
        <div class="catalog-article description align-justify">
            {!!$options->where('option_name', 'text_2')->pluck('value')->first()!!}
        </div>
        @include('layouts.reviewStars')
    </div>

    <div class="row full-width padding-top-70 padding-bottom-66 parallax parallax-1" style="position: relative;">
        <div class="parallax-add-div "></div>
            <div class="row  testimonials-container">
            <a href="#" class="slider-control left template-arrow-left-1"></a>
            <ul class="testimonials-list">
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"Несколько лет работал на плохой работе, вечно в наклоненном положении,
                        ну и конечно заработал проблемы со спиной, даже немного горб был.
                        Обратился к врачам данного центра, все очень понравилось, хорошие врачи,
                        массажисты, назначили курс лечения, за полтора месяца убрали горб и небольшие недостатки,
                        сейчас вот по специально написаному курсу долечиваюсь дома. Вообщем всем советую!
                        Не бойтесь идти к врачам, врачи плохого не сделают."</p>
                    <div class="author">Руслан</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"С возрастом проблемы со спиной все чаще стали беспокоить, подруга порекомендовала эту клинику,
                        чему я ей намного благодарна редко встретишь врачей,
                        уважительно и понимающие относящихся к твоему возрасту, состоянию и болезням"</p>
                    <div class="author">Валерия Васильевна</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"Здравствуйте хочу оставить свой отзыв о работе Вашего центра-
                        мне лечение помогло и все очень понравилось: и квалификация персонала,
                        и тренировки, и отношение к пациентам. Попал сюда совершенно случайно -
                        был в еврейской больнице, ожидая доктора, в очереди мне посоветовали хорошего мануальщика,
                        Франко Эдуарда, который принимает прямо через дорогу.
                        В тот же день пошел к нему и уже через день пришел на занятие.
                        Мне вставляли позвонки, делали массаж, а еще я занимался на доске Евминова.
                        И благодаря этому комплексному лечению, спустя 2 недели, у меня прошли так мучащие меня
                        в течении полугода боли в спине.... уже прошло 4 месяца после занятий, но слава богу,
                        боли не возвращались. И если они вернутся (не дай бог) , я обязательно обращусь к Вам!"</p>
                    <div class="author">Александр Викторович</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"Спасибо сотрудникам центра за эффективные занятия.
                        Четыре месяца назад постоянно тревожили боли в спине, не могла сидеть на одном месте -
                        ломило спину ужасно! пошла на занятия йогой и массаж - как же это релаксирует и как же это приятно!
                        Очень все понравилось! неприятные ощущения до сих пор не возвращались!"</p>
                    <div class="author">Лера</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"Благодарю доктора и весь персонал центра.
                        В жизни не подумала, что от такой сильной боли в спине,
                        которая пол года беспокоила можно избавиться в такой короткий срок!
                        Прошла 4 занятия по коррекции позвоночника+курс ЛФК, в общей сложности чуть больше недели,
                        и Вы не поверите, но боли прошли, и я вспоминаю то время, как страшный сон! СПАСИБО!"</p>
                    <div class="author">Екатерина Ивановна</div>
                </li>
            </ul>
            <a href="#" class="slider-control right template-arrow-left-1"></a>
        </div>

    </div>
@endsection
