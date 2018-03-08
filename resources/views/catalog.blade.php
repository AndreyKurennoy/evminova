@extends('layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/rating.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/reviews.css')}}" />
@stop

@section('content')
    @include('column-menu')

    <div class="margin-top-30"></div>
@stop

@section('scripts')
    @if(isset($currentSheet) && !empty($currentSheet))
        <script> var entityCategory = 2; var url = "{{route('saverating')}}"; var token = "{{ csrf_token() }}"; var id = "{{$currentSheet->id}}"; var slug = "{{request()->path()}}"; </script>
        <script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
    @endif
@stop