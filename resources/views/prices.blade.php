@extends('layouts.index')

@section('content')
<div class="row">
    <h1 class="box-header margin-bottom-30 margin-top-20">@if($option = $options->where('option_name', 'header')->pluck('value')->first()) {{$option}}@endif</h1>
    <div class="column-3-4" style="margin: auto">
        @if($text_1 = $options->where('option_name', 'text_1')->pluck('value')->first()) {!! $text_1 !!}@endif
    </div>

</div>

    @include('layouts.enroll')
@stop