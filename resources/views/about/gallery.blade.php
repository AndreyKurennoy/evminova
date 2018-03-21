@extends('about.about')
@section('head')
    <link rel="stylesheet" type="text/css" href="/plugins/lightbox/css/lightbox.css">
@stop
@section('inner-content')
    <div class="row">
        <h1 class="box-header margin-bottom-30">@if(isset($meta['h1'])) {{$meta['h1']}} @endif</h1>
        <div class="certificates-container">
            @foreach($photos as $photo)
                <div class="certificate">
                    <div class="certificates-img">
                        <a  href="/gallery/{{$photos_pages[$loop->index]->slug}}">
                            <img src="{{$photo->thumb}}" alt="@if(isset($photo->alt)){{$photo->alt}}@endif">
                        </a>
                    </div>
                    <div class="certificates-preview">
                        {{$photos_pages[$loop->index]->title}}
                    </div>
                </div>
            @endforeach
        </div>

        @include('questions')
    </div>
@stop

