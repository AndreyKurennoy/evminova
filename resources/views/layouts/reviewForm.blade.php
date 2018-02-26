<div class="row full-width page-margin-top-section padding-bottom-66">
    <div class="row">
        <h2 class="box-header padding-bottom-61">ОСТАВИТЬ ОТЗЫВ</h2>
        <form class="contact-form" id="review-form">
            <div class="row">
                <fieldset class="column column-1-2">
                    <input class="text-input" name="name" type="text" placeholder="Имя ">
                    <input class="text-input" name="problem" type="text" placeholder="Что вас беспокоило?">
                    <input class="text-input" name="email" type="text" placeholder="Email*">
                </fieldset>
                <fieldset class="column column-1-2">
                    <textarea name="body" placeholder="Ваш отзыв"></textarea>
                </fieldset>
            </div>
            <div class="row margin-top-30">
                <div class="column column-1-2 align-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<input type="hidden" name="enroll" value="1">--}}
                    <input type="button" id="review" name="submit_question" value="ЗАПИСАТЬСЯ" class="more active">
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script>var reviewUrl = "{{route('savereview')}}"; var token = "{{ csrf_token() }}";</script>
    <script type="text/javascript" src="{{ asset('/js/rating.js') }}"></script>
@endsection