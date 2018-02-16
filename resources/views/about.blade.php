@extends('layouts.index')
@section('content')
    <div class="clearfix">
        <div class="row margin-top-30">
            <div class="column column-1-4 margin-bottom-30">
                <ul class="vertical-menu">
                    {{--@foreach($sheets as $sheet)--}}
                    <li {{--@if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif --}}>
                        <a href="/catalog/{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                            {{--{{$sheet->title}}--}}
                            О Центре
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    <li {{--@if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif --}}>
                        <a href="/catalog/{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                            {{--{{$sheet->title}}--}}
                            Персонал
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    <li {{--@if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif --}}>
                        <a href="/catalog/{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                            {{--{{$sheet->title}}--}}
                            Сертификаты
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    <li {{--@if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif --}}>
                        <a href="/catalog/{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                            {{--{{$sheet->title}}--}}
                            Фотографии
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    <li {{--@if(isset($currentSheet->slug) and $currentSheet->slug == $sheet->slug) class="selected"  @endif --}}>
                        <a href="/catalog/{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                            {{--{{$sheet->title}}--}}
                            Отзывы
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    {{--@endforeach--}}
                </ul>
            </div>
            <div class="column column-3-4">
                <div class="row">
                    {{--<div class="padding-top-bottom-30">--}}
                    <h1 class="box-header margin-bottom-30">@if(isset($currentSheet->title)) {{$currentSheet->title}} @else Услуги и цены @endif</h1>
                    <div class="catalog-article description align-justify">
                        {{--@if(isset($currentSheet->body)) {!!html_entity_decode($currentSheet->body)!!} @else--}}
                            {{--{!!$options->where('option_name', 'text_1')->pluck('value')->first()!!}--}}
                        {{--@endif--}}
                    </div>
                    {{--</div>--}}
                </div>
                @if(isset($currentSheet) && !empty($currentSheet))
                    <div class="row">
                        <div class="body_rating">
                            <div class="rating-title">
                                Оцените эту страницу:
                            </div>
                            <div id="rating_info">
                                <div class="rating rating2">
                                    <a data-rating="" title="5" value="5">★</a>
                                    <a data-rating="" title="4" value="4">★</a>
                                    <a data-rating="" title="3" value="3">★</a>
                                    <a data-rating="" title="2" value="2">★</a>
                                    <a data-rating="" title="1" value="1">★</a>
                                </div>
                            </div>
                            <div class="text-rating" itemscope="" itemtype="http://schema.org/Service">
                                <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <span itemprop="itemReviewed" style="display: none">
                                <span id="itemReviewed_name" itemprop="name">{{$currentSheet->title}}</span>
                            </span>
                                    Рейтинг <span id="Agr_Rating" itemprop="ratingValue">{{$rating['value']}}</span> из
                                    <span itemprop="bestRating">5</span>
                                    -  <span id="Count_Rating" itemprop="ratingCount">{{$rating['count']}}</span> проголосовало
                                </div>
                            </div>
                            <div class="loading">Загрузка…</div>
                        </div>
                    </div>
                @endif

                @include('questions')


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
    <div class="margin-top-30"></div>
@endsection