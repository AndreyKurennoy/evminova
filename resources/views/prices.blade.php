@extends('layouts.index')

@section('content')
<div class="row">
    <h1 class="box-header margin-bottom-30 margin-top-20">@if($option = $options->where('option_name', 'header')->pluck('value')->first()) {{$option}}@endif</h1>
    <div class="column-3-4" style="margin: auto">
    {{--<div class="row">--}}
        @if($text_1 = $options->where('option_name', 'text_1')->pluck('value')->first()) {!! $text_1 !!}@endif
    {{--</div>--}}
    </div>

    {{--@foreach($price_types as $price_type)--}}
        {{--<div class="row margin-bottom-30">--}}
            {{--<h4 class="price-header box-header margin-bottom-20" style="float: left">{{$price_type->name}}</h4>--}}
            {{--<div class="wpb_raw_code wpb_content_element wpb_raw_html">--}}
                {{--<div class="wpb_wrapper">--}}
                    {{--<table class="margin-top-40">--}}
                        {{--<tbody>--}}
                        {{--@foreach($prices->where('price_type', $price_type->id ) as $price)--}}
                            {{--<tr>--}}
                                {{--<td style="width: 50%">{{$price->name}}</td>--}}
                                {{--<td>{{$price->price}}</td>--}}
                            {{--</tr>--}}
                        {{--</tbody>--}}
                        {{--@endforeach--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
</div>

    @include('layouts.enroll')
@stop