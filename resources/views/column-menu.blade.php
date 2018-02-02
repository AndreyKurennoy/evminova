
<div class="clearfix">
    <div class="row margin-top-30">
        <div class="column column-1-4 margin-bottom-30">
            <ul class="vertical-menu">
                @foreach($sheets as $sheet)
                    <li @if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif>
                        <a href="/catalog/{{$sheet->slug}}" title="{{$sheet->title}}">
                            {{$sheet->title}}
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="column column-3-4">
            <div class="row">
                {{--<div class="padding-top-bottom-30">--}}
                <h3 class="box-header margin-bottom-30">@if(isset($currentSheet->title)) {{$currentSheet->title}} @else Центр Евминова в Одессе - Ваш верный помощник в борьбе с недугами! @endif</h3>
                <div class="catalog-article description align-justify">
                    @if(isset($currentSheet->body)) {!!html_entity_decode($currentSheet->body)!!} @else
                    На мировом рынке битумная черепица BP на сегодняшний день –
                    один из лучших материалов для кровли. Канадская мягкая кровля BP отлично выполняет свои функции
                    в любом климате, на каждом доме независимо от типа крыши. Битумная канадская черепица ВР – это
                    высокое качество, оригинальный дизайн, широкая цветовая гамма и надежность. Для архитекторов и
                    дизайнеров это находка, а для конечного потребителя –защита на многие десятилетия, солидность и
                    красота!
                    @endif
                </div>
                {{--</div>--}}
            </div>
            @if(isset($doctors))
            <div class="row margin-top-20">
                <h3 class="margin-top-20 margin-bottom-20" style="text-align: left;color: #1892df;">Лечение проводят:</h3>
                <div class="flex-container">
                    @foreach($doctors as $doctor)
                    <div class="flex-item">
                        <img src="/storage/tCeOAxPFqXHq0mdlRWwhEXJ0LJnafUSlqxgwQD4P.jpeg" alt="">
                        <div class="name">{{$doctor->firstName}} {{$doctor->lastName}}</div>
                        <div class="description"><p>{{$doctor->description}}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="row margin-top-20" style="background: #f0f7ff;border: 1px solid #bddef6">
                <h3 class="margin-top-20 margin-bottom-20" style="text-align: center;color: #1892df;">Записаться на прием</h3>
                <div class="row margin-bottom-30">
                    <form action="#" class="write-med" >
                        <input type="text" placeholder="Имя*" class="text">
                        <input type="text" placeholder="Телефон*" class="text">
                        <span class="more">Заказать</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>