@extends('voyager::master')
@section('page_title', __('voyager.generic.viewing').' Галереи')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Галереи
        </h1>
        @can('add',app("TCG\Voyager\Models\Page"))
            <a href="{{ route('voyager.gallery.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Добавить</span>
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
                                    <th class="sorting">Дата изменения</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sheets as $sheet)
                                    <tr id="{{$sheet->id}}">
                                        <td><div class="readmore" style="max-height: none;">{{$sheet->title}}</div></td>
                                        <td>{{$sheet->created_at}}</td>
                                        <td class="no-sort no-click" id="bread-actions">
                                            <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="{{$sheet->id}}" id="delete{{$sheet->id}}">
                                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                            </a>
                                            <a href="{{ route('voyager.gallery.edit', $sheet->id) }}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
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
        <div class="row">
            <form role="form" action="/admin/gallerymeta" method="POST" enctype="multipart/form-data">
                <div class="col-md-4">
                {{ csrf_field() }}
                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <input type="hidden" name="slug" value="certificates">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>SEO информация</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Описание (meta)</label>
                                <textarea class="form-control" name="meta_description">@if(Request::old('meta_description') !== null){{Request::old('meta_description')}}@elseif($main_options->where('option_name', 'meta_description')->pluck('value')->first() !== null){{$main_options->where('option_name', 'meta_description')->pluck('value')->first()}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Ключевые слова (meta)</label>
                                <textarea class="form-control" name="meta_keywords">@if(Request::old('meta_keywords') !== null){{Request::old('meta_keywords')}}@elseif($main_options->where('option_name', 'meta_keywords')->pluck('value')->first() !== null){{$main_options->where('option_name', 'meta_keywords')->pluck('value')->first()}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">SEO название</label>
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="@if(Request::old('seo_title')){{Request::old('seo_title')}}@elseif($main_options->where('option_name', 'seo_title')->pluck('value')->first() !== null){{$main_options->where('option_name', 'seo_title')->pluck('value')->first()}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="name">Тайтл</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="@if(Request::old('title')){{Request::old('title')}}@elseif($main_options->where('option_name', 'title')->pluck('value')->first() !== null){{$main_options->where('option_name', 'title')->pluck('value')->first()}}@endif">
                            </div>
                        </div>
                        <button type="submit" style="float: right" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>

            </form>
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
                    <form action="{{ route('voyager.gallery.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        {{--<input type="submit" class="btn btn-danger pull-right delete-confirm"--}}
                               {{--value="{{ __('voyager.generic.delete_confirm') }}">--}}
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    </script>
@stop