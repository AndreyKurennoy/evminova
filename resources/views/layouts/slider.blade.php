@section('head')

@stop

<!-- Slider Revolution -->
<div class="revolution-slider-container">
    <div class="revolution-slider">
        <ul style="display: none;">
            <!-- SLIDE 1 -->
            <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="1000">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/slider/slide-1.jpg')}}" alt="slidebg1" data-bgfit="cover">
                <!-- LAYERS -->
                <!-- LAYER 01 -->
                <div class="tp-caption customin customout"
                     data-x="0"
                     data-y="140"

                     data-customin="x:40;y:0;"
                     data-start="500"
                     data-speed="1200"
                     data-easing="easeInOutExpo"

                     data-customout="x:0;y:0;"
                     data-endspeed="500"
                     data-endeasing="easeInOutExpo">
                </div>
            </li>

            <!-- SLIDE 2 -->
            <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/slider/slide-2.jpg')}}" alt="slidebg2" data-bgfit="cover">
                <!-- LAYERS -->
                <!-- LAYER 01 -->
                <div class="tp-caption customin customout"
                     data-x="0"
                     data-y="140"

                     data-customin="x:40;y:0;"
                     data-start="500"
                     data-speed="1200"
                     data-easing="easeInOutExpo"

                     data-customout="x:0;y:0;"
                     data-endspeed="500"
                     data-endeasing="easeInOutExpo">
                </div>
            </li>


            <!-- SLIDE 3 -->
            <li data-transition="fade" data-masterspeed="500" data-slotamount="1" data-delay="6000">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/slider/slide-3.jpg')}}" alt="slidebg3" data-bgfit="cover">
                <!-- LAYERS -->
                <!-- LAYER 01 -->
                <div class="tp-caption customin customout"
                     data-x="0"
                     data-y="140"

                     data-customin="x:40;y:0;"
                     data-start="500"
                     data-speed="1200"
                     data-easing="easeInOutExpo"

                     data-customout="x:0;y:0;"
                     data-endspeed="500"
                     data-endeasing="easeInOutExpo">
                </div>
            </li>
        </ul>
    </div>
</div>
<!--/-->

@section('scripts')
    <!--slider revolution-->
    <script type="text/javascript" src="{{ asset('/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/slider/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/slider/odometer.min.js')}}"></script>
@stop