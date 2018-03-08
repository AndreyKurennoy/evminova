@extends('layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop

@section('content')
    <div class="clearfix">
        <div class="row margin-top-30">
            <div class="column column-1-4 margin-bottom-30">
                <ul class="vertical-menu">
                    @foreach($sheets as $sheet)
                    <li @if($sheet->slug == $currentSheet->slug) class="selected"  @endif>
                        <a href="@if($sheet->slug == 'question') /question @else /question/{{$sheet->slug}} @endif" title="О профилакторе">
                            {{$sheet->title}}
                            <span class="template-arrow-menu"></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                {{--@if(isset($profPhoto))--}}
                    {{--<div class="profilactor-container">--}}
                        {{--<a href="#">--}}
                            {{--<img src="{{$profPhoto->value}}" >--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--@endif--}}
            </div>
            <div class="column column-3-4">
                <div class="row">
                    {{--<div class="padding-top-bottom-30">--}}
                    <h1 class="box-header margin-bottom-30">{{$currentSheet->title}}</h1>
                    <div class="catalog-article description align-justify">
                        {!! $currentSheet->body !!}
                    </div>
                    {{--</div>--}}
                </div>
                @include('layouts.reviewStars')
                <div class="row margin-top-20">
                    <h2 class="margin-top-20" style="text-align: left;color: #1892df;">Отзывы пациентов:</h2>

                    <div class="reviews">
                        <div class="content-review margin-top-20">
                            <div class="header-review">
                                <div class="name-review">Ольга Сергеевна, диагноз такой-то</div>
                                <div class="category-review">Боли в шейном и поясничном отделах.</div>
                            </div>
                            <div class="message-review">Уважаемые сотрудники центра Евминова, примите мои искренние слова благодарности за Ваш труд, профессионализм и человеколюбие.
                                С Вашей помощью я смогла вернуться к полноценной жизни и забыть о болях в спине.
                                К тому же благодаря регулярным занятиям в вашем Центре я привела в порядок свой вес.
                                Желаю Вам благополучия и здоровья, реализации планов и успеха начинаниям.
                            </div>
                        </div>
                        <div class="content-review margin-top-20">
                            <div class="header-review">
                                <div class="name-review">Ольга Сергеевна, диагноз такой-то</div>
                                <div class="category-review">Боли в шейном и поясничном отделах.</div>
                            </div>
                            <div class="message-review">Уважаемые сотрудники центра Евминова, примите мои искренние слова благодарности за Ваш труд, профессионализм и человеколюбие.
                                С Вашей помощью я смогла вернуться к полноценной жизни и забыть о болях в спине.
                                К тому же благодаря регулярным занятиям в вашем Центре я привела в порядок свой вес.
                                Желаю Вам благополучия и здоровья, реализации планов и успеха начинаниям.
                            </div>
                        </div>
                    </div>
                </div>
                @include('profilaktor-zakaz')
            </div>
        </div>
    </div>

@stop

@section('scripts')
    {{--@if(isset($currentSheet) && !empty($currentSheet))--}}
    <script> var url = "{{route('saverating')}}"; var token = "{{ csrf_token() }}"; var slug = "{{request()->path()}}"; </script>
    <script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
    {{--@endif--}}
@stop