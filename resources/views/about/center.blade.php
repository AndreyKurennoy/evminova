@extends('about.about')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop
@section('inner-content')

    <div class="column column-3-4">
        <div class="row">
            <h1 class="box-header margin-bottom-30">@if(isset($content->title)) {{$content->title}} @else О Центре @endif</h1>
            <div class="catalog-article description align-justify">
                 {!!html_entity_decode($content->body)!!}
            </div>
        </div>
    </div>
    @include('layouts.reviewStars')
    @include('layouts.enroll')
@stop

@section('scripts')
    @if(isset($currentSheet) && !empty($currentSheet))
        <script> var entityCategory = 2; var url = "{{route('catalog.store')}}"; var token = "{{ csrf_token() }}"; var id = "{{$content->id}}" </script>
        <script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
    @endif
@stop