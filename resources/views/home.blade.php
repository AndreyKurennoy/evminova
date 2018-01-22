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
                        <h4>BEST MATERIALS</h4>
                        <p>We have the experience, personel and resources to make the project run smoothly. We can ensure a job is done on time.</p>
                    </li>
                    <li class="sl-small-2">
                        <h4>PROFESSIONAL STANDARDS</h4>
                        <p>Work with us involve a carefully planned series of steps, centered around a schedule we stick to and daily communication.</p>
                    </li>
                </ul>
            </div>
            <div class="column column-1-2">
                <ul class="features-list">
                    <li class="sl-small-3 margin-top-40">
                        <h4>OVER 15 YEARS EXPERIENCE</h4>
                        <p>We combine quality workmanship, superior knowledge and low prices to provide you with service unmatched by our competitors.</p>
                    </li>
                    <li class="sl-small-4">
                        <h4>BEST MATERIALS</h4>
                        <p>We have the experience, personel and resources to make the project run smoothly. We can ensure a job is done on time.</p>
                    </li>
                    <li class="sl-small-5">
                        <h4>PROFESSIONAL STANDARDS</h4>
                        <p>Work with us involve a carefully planned series of steps, centered around a schedule we stick to and daily communication.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row margin-top-26">
        <h3 class="box-header margin-bottom-30">Популярные процедуры</h3>
        <p class="description ">Ассортимент мягкой черепицы BP настолько богат, что поможет
            удовлетворить требования любого заказчика: практичного, изысканного и экономичного.</p>
        <p class="description align-justify"> Ламинированная кровля превосходит по прочности обычную
            битумную черепицу, поскольку имеет в своей основе не один, а два несвязанных друг с другом слоя
            армированного стекловолокна. Большие выразительные 3D
            теневые полосы и приглушенная окраска создают глубокий, смелый и динамичный стиль.</p>
        <p class="description align-justify"> Классическая однослойная битумная черепица серии DAKOTA и
            YUKON SB имеет привлекательный винтажный стиль,
            который придаст красоту вашей кровле и подойдет под любой фасад. </p>
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
        <p class="description align-justify">На мировом рынке битумная черепица BP на сегодняшний день –
            один из лучших материалов для кровли. Канадская мягкая кровля BP отлично выполняет свои функции
            в любом климате, на каждом доме независимо от типа крыши. Битумная канадская черепица ВР – это
            высокое качество, оригинальный дизайн, широкая цветовая гамма и надежность. Для архитекторов и
            дизайнеров это находка, а для конечного потребителя –защита на многие десятилетия, солидность и
            красота!</p>
        <p class="description align-justify">Гибкая черепица BP имеет длинную историю и отличается
            стабильным качеством.
            Компания-производитель Building Products of Canada Corporation одна из первых в мире начала
            производство гибкой черепицы в 1925 году и на данный момент занимает лидирующее положение по
            качеству выпускаемой продукции. Каждый год продукцию компании BP выбирают сотни тысяч
            человек!</p>

        <p class="description align-justify">Все компоненты для изготовления кровли производятся в Канаде.
            Сырье и весь производственный процесс на каждой стадии контролируется Североамериканскими
            специалистами и соответствует местным жестким стандартам качества, что обеспечивает высокое
            качество конечного продукта.<br></p>
        <p class="description align-justify">На мировом рынке битумная черепица BP на сегодняшний день –
            один из лучших материалов для кровли. Канадская мягкая кровля BP отлично выполняет свои функции
            в любом климате, на каждом доме независимо от типа крыши. Битумная канадская черепица ВР – это
            высокое качество, оригинальный дизайн, широкая цветовая гамма и надежность. Для архитекторов и
            дизайнеров это находка, а для конечного потребителя –защита на многие десятилетия, солидность и
            красота!</p>
        <p class="description align-justify">Гибкая черепица BP имеет длинную историю и отличается
            стабильным качеством.
            Компания-производитель Building Products of Canada Corporation одна из первых в мире начала
            производство гибкой черепицы в 1925 году и на данный момент занимает лидирующее положение по
            качеству выпускаемой продукции. Каждый год продукцию компании BP выбирают сотни тысяч
            человек!</p>

        <p class="description align-justify">Все компоненты для изготовления кровли производятся в Канаде.
            Сырье и весь производственный процесс на каждой стадии контролируется Североамериканскими
            специалистами и соответствует местным жестким стандартам качества, что обеспечивает высокое
            качество конечного продукта.<br></p>

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