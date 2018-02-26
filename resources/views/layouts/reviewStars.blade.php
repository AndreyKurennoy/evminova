{{--@if(isset($currentSheet) && !empty($currentSheet))--}}
    <div class="row">
        <div class="body_rating">
            <div class="rating-title">
                Оцените эту страницу:
            </div>
            <div id="rating_info">
                <div class="rating rating2">
                    <a data-rating="" title="5" value="5">★</a>
                    <a data-rating="" title="4" value="4">★</a>
                    <a data-rating="" title="3" value="3">★</a>
                    <a data-rating="" title="2" value="2">★</a>
                    <a data-rating="" title="1" value="1">★</a>
                </div>
            </div>
            <div class="text-rating" itemscope="" itemtype="http://schema.org/Service">
                <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <span itemprop="itemReviewed" style="display: none">
                                <span id="itemReviewed_name" itemprop="name">{{$ratingSlug['name']}}</span>
                            </span>
                    Рейтинг <span id="Agr_Rating" itemprop="ratingValue">{{$ratingSlug['value']}}</span> из
                    <span itemprop="bestRating">5</span>
                    -  <span id="Count_Rating" itemprop="ratingCount">{{$ratingSlug['count']}}</span> проголосовало
                </div>
            </div>
            <div class="loading">Загрузка…</div>
        </div>
    </div>
{{--@endif--}}