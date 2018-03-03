@extends('layouts.index')

@section('content')
<div class="row">
    <h1 class="box-header margin-bottom-30">Цены на услуги Центра Евминова</h1>
    @foreach($price_types as $price_type)
        <div class="row margin-bottom-30">
            <h4 class="price-header box-header margin-bottom-20" style="float: left">{{$price_type->name}}</h4>
            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                <div class="wpb_wrapper">
                    <table class="margin-top-40">
                        <tbody>
                        @foreach($prices->where('price_type', $price_type->id ) as $price)
                            <tr>
                                <td style="width: 50%">{{$price->name}}</td>
                                <td>{{$price->price}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>

    @include('layouts.enroll')
@stop