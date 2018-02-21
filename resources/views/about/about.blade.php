@extends('layouts.index')
@section('content')
<div class="clearfix">
    <div class="row margin-top-30">
        <div class="column column-1-4 margin-bottom-30">
            <ul class="vertical-menu">
                {{--@foreach($sheets as $sheet)--}}

                <li @if(Request::is('about')) class="selected"  @endif>
                    <a href="/about{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                        {{--{{$sheet->title}}--}}
                        О Центре
                        <span class="template-arrow-menu"></span>
                    </a>
                </li>
                <li @if(Request::is('about/doctors')) class="selected"  @endif>
                    <a href="/about/doctors{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                        {{--{{$sheet->title}}--}}
                        Доктора
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
                <li @if(Request::is('guestbook')) class="selected"  @endif>
                    <a href="/guestbook{{--$sheet->slug--}}" title="{{--$sheet->title--}}">
                        {{--{{$sheet->title}}--}}
                        Отзывы
                        <span class="template-arrow-menu"></span>
                    </a>
                </li>
                {{--@endforeach--}}
            </ul>
        </div>
        <div class="column column-3-4">
            @yield('inner-content')
        </div>
    </div>

</div>
@endsection