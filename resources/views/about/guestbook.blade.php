@extends('about.about')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop
@section('inner-content')

        <div class="row margin-top-20">
            <h1 class="box-header margin-top-20" style="color: #1892df;">Отзывы пациентов</h1>

            <div class="reviews">
                @foreach($reviews as $review)
                <div class="content-review margin-top-20">
                    <div class="header-review">
                        <div class="name-review">{{$review->name}}</div>
                        <div class="category-review">{{$review->problem}}</div>
                        <div class="date-review date">{{$review->date}}</div>
                    </div>
                    <div class="message-review">{!! $review->body !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    @include('layouts.reviewForm')
@stop