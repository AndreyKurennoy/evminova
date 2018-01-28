@extends('layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('/css/catalog.css')}}" />
@stop

@section('content')
    @include('column-menu')

    <div class="margin-top-30"></div>
@stop