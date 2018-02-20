@extends('about.about')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop
@section('inner-content')

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


    @include('layouts.enroll')
@stop