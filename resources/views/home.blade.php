@extends('layouts.index')

@section('slider')
    @include('layouts.slider')
@endsection

@section('content')
    <div class="row blue full-width padding-top-30 padding-bottom-17">
        <div class="row margin-bottom-20">
            <h3 class="header" style="text-align: center; color: #FFFFFF;">Центр Евминова - вернет здоровье вашему позвоночнику!</h3>
        </div>
        <div id="top-block" class="row padding-top-7 full-width" style="display: flex">
            <div class="column">
                <ul class="features-list gold">
                    <li class="sl-small-years">
                        <h5>Работаем с 2002 года</h5>
                        <p>За 15 лет работы мы помогли 4000 пациентам</p>
                    </li>
                </ul>
            </div>
            <div class="column">
                <ul class="features-list gold">
                    <li class="sl-small-complex">
                        <h5>Комплексное лечение</h5>
                        <p>Используем безоперационные методы и минимум лекарств</p>
                    </li>
                </ul>
            </div>
            <div class="column">
                <ul class="features-list gold">
                    <li class="sl-small-methodic">
                        <h5>Методика Евминова</h5>
                        <p>В лечении используем запатентованную методику Евминова</p>
                    </li>
                </ul>
            </div>
            <div class="column">
                <ul class="features-list gold">
                    <li class="sl-small-doctors">
                        <h5>Квалифицированные врачи</h5>
                        <p>Опытные врачи с 20-летним стажем лечебной практики</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row margin-top-20 margin-bottom-30">
        <div class="row">
            <h3 class="box-header">С какими недугами справляются в центре Евминова?</h3>
         </div>
        <div class="row margin-top-10">
            <div class="column column-1-2">
                <ul class="features-list">
                    <li class="sl-small-90percent margin-top-40">
                        <h4>Устранение боли в спине</h4>
                        <p>90% пациентов отмечают значительное снижение боли и дискомфорта благодаря курсу лечения по методике Евминова в нашем центре</p>
                    </li>
                    <li class="sl-small-1">
                        <h4>Восстановление эластичности дисков</h4>
                        <p>Занятия по методике Евминова улучшают питание тканей межпозвоночных дисков, восстанавливая их эластичность. Занятия способствуют уменьшению грыж в размере, рубцеванию и заживлению поврежденных дисков.</p>
                    </li>
                    <li class="sl-small-2">
                        <h4>Возвращаем радость движения</h4>
                        <p>Методика Евминова регулирует взаимодействие нервной системы и мышц, улучшая баланс и координацию движений.</p>
                    </li>
                </ul>
            </div>
            <div class="column column-1-2">
                <ul class="features-list">
                    <li class="sl-small-3 margin-top-40">
                        <h4>Укрепление мышечного карсета</h4>
                        <p>Занятия на профилакторе Евминова эффективно и безопасно укрепляют глубокие мышцы спины, что невозможно сделать на обычных фитнес-тренажерах.</p>
                    </li>
                    <li class="sl-small-4">
                        <h4>Восстановление эластичности дисков</h4>
                        <p>Занятия на доске Евминова дают возможность в одних и тех же упражнениях для позвоночника давать разную нагрузку для разных сторон тела и групп мышц, восстанавливая баланс.</p>
                    </li>
                    <li class="sl-small-5">
                        <h4>Восстановление глубоких мышц спины</h4>
                        <p>Благодаря специализированным тренажерам для спины проблемные зоны изолируются и получают ровно столько нагрузки, сколько нужно для постепенного восстановления и укрепления глубоких мышц.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row margin-top-26">
        <h3 class="box-header margin-bottom-30">Популярные процедуры</h3>
        <div class="catalog-article description align-justify">
            {!!$options->where('option_name', 'text_1')->pluck('value')->first()!!}
        </div>
        <ul class="services-list clearfix padding-top-30">
            <li>
                <a href="#" title="Interior Renovation">
                    <img src="images/home/procedures/correction.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="#" title="Interior Renovation">Лечебный массаж</a></h4>
                {{--<p>We can help you bring new life to existing rooms and develop unused spaces.</p>--}}
            </li>
            <li>
                <a href="#" title="Design and Build">
                    <img src="images/home/procedures/fiziotherapy.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="#" title="Design and Build">Лечебный массаж</a></h4>
                {{--<p>From initial design and project specification to archieving a high end finish.</p>--}}
            </li>
            <li>
                <a href="#" title="Tiling and Painting">
                    <img src="images/home/procedures/lfk.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="#" title="Tiling and Painting">Лечебный массаж</a></h4>
                {{--<p>We offer quality tiling and painting solutions for interior and exterior.</p>--}}
            </li>
            <li>
                <a href="#" title="Paver Walkways">
                    <img src="images/home/procedures/kinezoterapia.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="service_interior_renovation.html" title="PAVER WALKWAYS">Лечебный массаж</a></h4>
                {{--<p>Brick pavers define beauty, elegance and durability for driveways, patios and walkways.</p>--}}
            </li>
            <li>
                <a href="#" title="Household Repairs">
                    <img src="images/home/procedures/manual-therapy.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="#" title="Household Repairs">Лечебный массаж</a></h4>
                {{--<p>We offer affordable and reliable repairs and improvements to the home.</p>--}}
            </li>
            <li>
                <a href="#" title="Solar Systems">
                    <img src="images/home/procedures/massage.jpg" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="#" title="Solar Systems">Лечебный массаж</a></h4>
                {{--<p>Generate cheap, green electricity from sunlight using photovoltaic cells.</p>--}}
            </li>
        </ul>
    </div>

    <div class="row  padding-top-bottom-30">
        <h3 class="box-header margin-bottom-30">Центр Евминова в Одессе - Ваш верный помощник в борьбе с недугами!</h3>
        <div class="catalog-article description align-justify">
            {!!$options->where('option_name', 'text_2')->pluck('value')->first()!!}
        </div>
    </div>

    <div class="row full-width padding-top-70 padding-bottom-66 parallax parallax-1">
        <div class="row testimonials-container">
            <a href="#" class="slider-control left template-arrow-left-1"></a>
            <ul class="testimonials-list">
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"We would like to thank Renovate Company for an outstanding effort on this
                        recently completed project located in the Moscow. The project involved a very
                        aggressive schedule and it was completed on time. We would certainly like to
                        use their professional services again."</p>
                    <div class="author">MITCHEL SMITH</div>
                    <div class="author-details">CEO OF NEW PORT COMPANY</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"We would like to thank Renovate Company for an outstanding effort on this
                        recently completed project located in the Moscow. The project involved a very
                        aggressive schedule and it was completed on time. We would certainly like to
                        use their professional services again."</p>
                    <div class="author">MITCHEL SMITH</div>
                    <div class="author-details">CEO OF NEW PORT COMPANY</div>
                </li>
                <li class="sl-small-conversation">
                    <div class="ornament"></div>
                    <p>"We would like to thank Renovate Company for an outstanding effort on this
                        recently completed project located in the Moscow. The project involved a very
                        aggressive schedule and it was completed on time. We would certainly like to
                        use their professional services again."</p>
                    <div class="author">MITCHEL SMITH</div>
                    <div class="author-details">CEO OF NEW PORT COMPANY</div>
                </li>
            </ul>
            <a href="#" class="slider-control right template-arrow-left-1"></a>
        </div>
    </div>
@endsection