@extends('layouts.index')

@section('slider')
    @include('layouts.slider')
@endsection

@section('content')
    <div class="row margin-top-20 margin-bottom-30">
        <div class="row">
            <h2 class="box-header">ABOUT US</h2>
         </div>
        <div class="row margin-top-10">
            <div class="column column-1-2">
                <ul class="features-list">
                    <li class="sl-small-90percent margin-top-40">
                        <h4>Устранение боли в спине</h4>
                        <p>90% пациентов отмечают значительное снижение боли и дискомфорта благодаря курсу лечения по методике Евминова в нашем центре</p>
                    </li>
                    <li class="sl-small-1">
                        <h4>BEST MATERIALS</h4>
                        <p>We have the experience, personel and resources to make the project run smoothly. We can ensure a job is done on time.</p>
                    </li>
                    <li class="sl-small-2">
                        <h4>PROFESSIONAL STANDARDS</h4>
                        <p>Work with us involve a carefully planned series of steps, centered around a schedule we stick to and daily communication.</p>
                    </li>
                </ul>
            </div>
            <div class="column column-1-2">
                <ul class="features-list">
                    <li class="sl-small-3 margin-top-40">
                        <h4>OVER 15 YEARS EXPERIENCE</h4>
                        <p>We combine quality workmanship, superior knowledge and low prices to provide you with service unmatched by our competitors.</p>
                    </li>
                    <li class="sl-small-4">
                        <h4>BEST MATERIALS</h4>
                        <p>We have the experience, personel and resources to make the project run smoothly. We can ensure a job is done on time.</p>
                    </li>
                    <li class="sl-small-5">
                        <h4>PROFESSIONAL STANDARDS</h4>
                        <p>Work with us involve a carefully planned series of steps, centered around a schedule we stick to and daily communication.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection