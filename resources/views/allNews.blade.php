@extends('layouts.index')

@section('content')
    <div class="row">
        <h1 class="box-header margin-bottom-30">Полезные статьи и новости Центра Евминова</h1>
        <div class="row margin-bottom-30">
            <div class="article-preview">
                @foreach($news as $new)
                <div class="article-content margin-bottom-20">
                    <div class="article-image">
                        <div class="article-img" >
                            <a style="text-decoration: none;" href="/news/{{$new->slug}}">
                                <img style="width: 100px;max-width: 100px!important;" src="{{$new->preview_img}}" alt="">
                            </a>
                        </div>
                        <div class="article-img-after">
                            <a href="/news/{{$new->slug}}">Подробнее</a>
                        </div>
                    </div>
                    <div class="article-block">
                        <div class="article-title">
                            <a style="text-decoration: none;" href="/news/{{$new->slug}}"><h4>{{$new->header}}</h4></a>
                        </div>
                        <div class="article-date">
                            <span>{{$new->date}}</span>
                        </div>
                        <div class="article-text">
                            {{ mb_strcut($new->preview,0,600) . "..." }}
                        </div>
                    </div>
                </div>
                @endforeach
                {{--<div class="article-content margin-bottom-20">--}}
                    {{--<div class="article-image">--}}
                        {{--<div class="article-img">--}}
                            {{--<img src="/storage/thumbs/наш_центр.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="article-img-after">--}}
                            {{--<a href="#">Подробнее</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="article-block">--}}
                        {{--<div class="article-title">--}}
                            {{--<h4>Лечение спины</h4>--}}
                        {{--</div>--}}
                        {{--<div class="article-date">--}}
                            {{--<span>12.05.2017</span>--}}
                        {{--</div>--}}
                        {{--<div class="article-text">--}}
                            {{--<p>Вы хотите одновременно расстаться с лишним весом, улучшить состояние кожи, кровообращение и избавиться от целлюлита? Вам поможет spa-обертывание в одесском Центре Евминова!</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <?php echo $news->render(); ?>
        </div>
    </div>
@stop