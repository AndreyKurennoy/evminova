@extends('layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop

@section('content')

    <div class="clearfix">
        <div class="row margin-top-30">
            <div class="column column-1-4">
                <h6 class="box-header">Интересные новости</h6>
                <ul class="blog small margin-top-30">
                    @foreach($innerNews as $article)
                    <li>
                        <a style="width: 90px;" href="/news/{{$article->slug}}" title="What a Difference a Few Months Make" class="post-image">
                            <img src="{{$article->preview_img}}" alt="">
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
            <div class="column column-3-4">
                <div class="row">
                    {{--<div class="padding-top-bottom-30">--}}
                    <h1 class="box-header margin-bottom-30">@if(isset($currentSheet->title)) {{$currentSheet->title}} @else Услуги и цены @endif</h1>
                    <div class="catalog-article description align-justify">
                        @if(isset($currentSheet->body)) {!!html_entity_decode($currentSheet->body)!!} @else
                            {!!$options->where('option_name', 'text_1')->pluck('value')->first()!!}
                        @endif
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
                                <span id="itemReviewed_name" itemprop="name">{{$ratingSlug['name']}}</span>
                            </span>
                                    Рейтинг <span id="Agr_Rating" itemprop="ratingValue">{{$ratingSlug['value']}}</span> из
                                    <span itemprop="bestRating">5</span>
                                    -  <span id="Count_Rating" itemprop="ratingCount">{{$ratingSlug['count']}}</span> проголосовало
                                </div>
                            </div>
                            <div class="loading">Загрузка…</div>
                        </div>
                    </div>
                @endif

                @include('questions')

                @if(isset($doctors) && $doctors !== null && !empty($doctors))
                    <div class="row margin-top-20">
                        <h2 class="margin-top-20 margin-bottom-20" style="text-align: left;color: #1892df;">Лечение проводят:</h2>
                        <div class="flex-container">
                            @foreach($doctors as $doctor)
                                <div class="flex-item">
                                    <img src="{{$doctor->photo}}" alt="">
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
                @include('reviews')
            </div>
        </div>
    </div>

    <div class="margin-top-30"></div>
@stop

@section('scripts')
    {{--@if(isset($currentSheet) && !empty($currentSheet))--}}
    <script> var url = "{{route('saverating')}}"; var token = "{{ csrf_token() }}"; var slug = "{{request()->path()}}"; </script>
    <script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
    {{--@endif--}}
@stop