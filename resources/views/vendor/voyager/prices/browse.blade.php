@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Цены')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i>Цены
        </h1>
        @can('add',app("TCG\Voyager\Models\Page"))
            <a href="#" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Добавить новую цену</span>
            </a>
        @endcan
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="sorting">Название</th>
                                    <th class="sorting">Цена</th>
                                    <th class="sorting">Тип услуги</th>
                                    <th class="sorting">Дата изменения</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($prices as $price)
                                        <tr id="{{$price->id}}">
                                            <td><div class="readmore" style="max-height: none;">{{$price->name}}</div></td>
                                            <td>{{$price->price}}</td>
                                            <td>{{$prices_all->where('id', $price->price_type)->first()->name}}</td>
                                            <td>{{$price->created_at}}</td>
                                            <td class="no-sort no-click" id="bread-actions">
                                                <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="{{$price->id}}" id="delete1">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                                </a>
                                                <a href="#" id="edit" data-id="{{$price->id}}" data-type="{{$price->price_type}}" data-name="{{$price->name}}" data-price="{{$price->price}}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
                                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Изменить</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager.generic.delete_question') }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.prices.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager.generic.delete_confirm') }}">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{--Single add modal--}}
    <div class="modal modal-success fade" tabindex="-1" id="add_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-wand"></i>Добавление новой цены</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.prices.index') }}" id="add_form" method="POST">
                        {{ method_field("POST") }}
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Название услуги" class="form-control" style="margin-bottom: 10px;">
                        <input type="text" name="price" placeholder="Цена" class="form-control" style="margin-bottom: 10px;" >
                        <select name="price_type" id="" style="float: left;">
                            @foreach($price_types as $price_type)
                            <option value="{{$price_type->id}}">{{$price_type->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" id="add_new" class="btn btn-danger pull-right add-confirm"
                               value="Добавить">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Отменить</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--Single edit modal--}}
    <div class="modal modal-success fade" tabindex="-1" id="edit_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-wand"></i>Редактирование цены</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.prices.index') }}" id="edit_form" method="POST">
                        {{ method_field("POST") }}
                        {{ csrf_field() }}
                        <input type="text" name="name" id="edit-name-input" class="form-control" style="margin-bottom: 10px" >
                        <input type="text" name="price" id="edit-price-input" class="form-control" style="margin-bottom: 10px" >
                        <select name="price_type" id="" style="float: left;">
                            @foreach($price_types as $price_type)
                                <option value="{{$price_type->id}}">{{$price_type->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" id="edit-id-input" class="form-control" >
                        <input type="submit" id="edit_new" class="btn btn-danger pull-right add-confirm"
                               value="Изменить">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Отменить</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <form class="form-edit-add" role="form" action="{{ route('voyager.savepage') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="slug" value="prices">
        <div class="col-md-4">
            <div class="panel panel-bordered panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-search"></i>SEO информация</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок"  data-slug-origin="title" data-slug-forceupdate="true" value="@if(null !== Request::old('title')){{Request::old('title')}}
                        @elseif(!empty($sheet->title)) {{$sheet->title}} @else {{''}}@endif">
                    </div>
                    <div class="form-group">
                        <label for="name">Описание (meta)</label>
                        <textarea class="form-control" name="meta_description">@if(null !== Request::old('meta_description')){{Request::old('meta_description')}}
                            @elseif(!empty($sheet->meta_description)) {{$sheet->meta_description}} @else {{''}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Ключевые слова (meta)</label>
                        <textarea class="form-control" name="meta_keywords">@if(null !== Request::old('meta_keywords')){{Request::old('meta_keywords')}}
                            @elseif(!empty($sheet->meta_keywords)) {{$sheet->meta_keywords}} @else {{''}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">SEO название</label>
                        <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="@if(null !== Request::old('seo_title')){{Request::old('seo_title')}}
                        @elseif(!empty($sheet->seo_title)) {{$sheet->seo_title}} @else {{''}}@endif">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Сохранить мета</button>
    </form>
@stop
@section('javascript')
    <script>
        $(document).ready(function () {
            var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager.datatable'),
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            // $('.side-body').multilingual();
        });

        var deleteFormAction;
        var addFormAction;
        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });

        $(document).on('click', '.btn-add-new', function (e){
            var form = $('#add_form')[0];

            if (!addFormAction) { // Save form action initial value
                addFormAction = form.action;
            }

            $('#add_modal').modal('show');
        });
        $(document).on('click', '#add_new', function (e) {
            e.preventDefault();
            var data = $('#add_form').serialize();
            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{{ route("voyager.prices.store") }}',
                data: data,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#add_modal').modal('hide');
                        window.location.replace("{{ route("voyager.prices.index") }}");
                    }
                }
            })
        });

        var url = '';
        $(document).on('click', '#edit', function (e){
            var form = $('#edit_form')[0];
            $('#edit-id-input').val($(this).attr("data-id"));
            $('#edit-name-input').val($(this).attr("data-name"));
            $('#edit-price-input').val($(this).attr("data-price"));
            url = '/admin/prices/' + $(this).attr("data-id");
            if (!addFormAction) { // Save form action initial value
                addFormAction = form.action;
            }
            $('#edit_modal').modal('show');
        });
        $(document).on('click', '#edit_new', function (e) {
            e.preventDefault();
            var data = $('#edit_form').serialize();
            $.ajax({
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: url,
                data: data,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#add_modal').modal('hide');
                        window.location.replace("{{ route("voyager.prices.index") }}");
                    }
                }
            })
        });
//        btn-add-new
    </script>
@stop