<div class="white-popup">
    {{--@foreach($reviews as $review)--}}
        {{--<div>{{$review->id}}</div>--}}
    {{--@endforeach--}}

        <div class="panel panel-bordered" id="getReviews">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th class="no-sort no-click">Добавить</th>
                            <th class="sorting">Проблема</th>
                            <th class="sorting" style="width: 50%;">Отзыв</th>
                            <th class="sorting">Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr id="{{$review->id}}">
                                <td><input type="checkbox" data-id="{{$review->id}}" @if($review->exist !== null)checked @endif></td>
                                <td>{{$review->problem}}</td>
                                <td>{{$review->body}}</td>
                                <td class="no-sort no-click">{{$review->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <span id="saveReviews" class="btn btn-primary">Выбрать отзывы</span>
</div>
