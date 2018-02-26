@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' О Центре')
@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> О Центре
        </h1>
        @can('add',app("TCG\Voyager\Models\Page"))
            <a href="{{ route('voyager.guestbook.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Добавить отзыв</span>
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
                                    <th class="sorting">Имя</th>
                                    <th class="sorting">Email</th>
                                    <th class="sorting">Проблема</th>
                                    <th class="sorting">Статус</th>
                                    <th class="sorting">Дата изменения</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr id="{{$review->id}}">
                                        <td><div class="readmore" style="max-height: none;">{{$review->name}}</div></td>
                                        <td><div class="readmore" style="max-height: none;">{{$review->email}}</div></td>
                                        <td><div class="readmore" style="max-height: none;">{{$review->problem}}</div></td>
                                        <td>@if($review->status == 1)Опубликовано @else Черновик @endif</td>
                                        <td>{{ !empty($review->updated_at) ? $review->updated_at : $review->created_at }}</td>
                                        <td class="no-sort no-click" id="bread-actions">
                                            <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="{{$review->id}}" id="delete1">
                                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                            </a>
                                            <a href="{{ route('voyager.guestbook.edit', $review->id) }}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
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
    <form class="form-edit-add" role="form" action="{{ route('voyager.savepage') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="slug" value="guestbook">
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
                    <form action="{{ route('voyager.guestbook.index') }}" id="delete_form" method="POST">
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        jQuery(document).ready(function() {

            var editor_config = {
                path_absolute : "/",
                selector: "textarea.custom-mce",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };

            tinymce.init(editor_config);

        });
    </script>
@stop