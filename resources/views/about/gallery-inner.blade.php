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
                        <a class="gallery" data-lightbox="roadtrip" rel="gallery" href="{{$photo->name}}">
                            <img src="{{$photo->thumb}}" alt="@if(isset($photo->alt)){{$photo->alt}}@endif">
                        </a>
                    </div>
                    <div class="certificates-preview">
                        {{$photo->description}}
                    </div>
                </div>
            @endforeach
        </div>

        @include('zapis')
    </div>
@stop

@section('scripts')
    {{--<script type="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/js/jquery.prettyPhoto.min.js"></script>--}}

    <script type="text/javascript" src="{{ asset('plugins/lightbox/js/lightbox.js')}}"></script>

@stop