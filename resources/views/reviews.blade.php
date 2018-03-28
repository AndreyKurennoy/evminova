@if(isset($reviews_sheet))
<div class="row margin-top-20">
    <h2 class="margin-top-20" style="text-align: left;color: #1892df;">Отзывы пациентов:</h2>

    <div class="reviews">
        @foreach($reviews_sheet as $review)
            <div class="content-review margin-top-20">
                <div class="header-review">
                    <div class="name-review">{{$review->name}}</div>
                    <div class="category-review">{{$review->problem}}</div>
                    <div class="date-review date">{{$review->date}}</div>
                </div>
                <div class="message-review">{!! $review->body !!}
                </div>
            </div>
        @endforeach
    </div>
    <a class='reviews-link' href="/guestbook">Смотреть все отзывы</a>
</div>
@endif