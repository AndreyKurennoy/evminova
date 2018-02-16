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
                                    <th class="sorting">Категория</th>
                                    <th class="sorting">Статус</th>
                                    <th class="sorting">Дата изменения</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="1">
                                    <td><div class="readmore" style="max-height: none;">Название</div></td>
                                    <td>Новости</td>
                                    <td>Опубликовано</td>
                                    <td>время</td>
                                    <td class="no-sort no-click" id="bread-actions">
                                        <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="1" id="delete1">
                                            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                        </a>
                                        <a href="{{ route('voyager.about.edit', 1) }}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Изменить</span>
                                        </a>
                                    </td>
                                </tr>
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
                        <input type="text" class="form-control" >
                        <input type="submit" class="btn btn-danger pull-right add-confirm"
                               value="Добавить">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Отменить</button>
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

//        btn-add-new
    </script>
@stop