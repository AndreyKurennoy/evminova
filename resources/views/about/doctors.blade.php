@extends('about.about')

@section('inner-content')

    <div class="row">
        <div class="doctors-container">
            @foreach($doctors as $doctor)
            <div class="doctor">
                <div class="img">
                    <img src="{{$doctor->photo}}" alt="Доктор {{$doctor->lastName}} {{$doctor->firstName}}">
                </div>
                <div class="doctor-info">
                    <div class="doctor-name">{{$doctor->lastName}} {{$doctor->firstName}}</div>
                    {{--<div class="doctor-description">--}}
                        <p class="doctor-description">
                            {{$doctor->description}}
                        </p>
                    {{--</div>--}}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('layouts.enroll')
@stop