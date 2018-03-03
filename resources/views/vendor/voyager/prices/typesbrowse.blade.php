@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Цены')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i>Тип услуги
        </h1>
        @can('add',app("TCG\Voyager\Models\Page"))
            <a href="#" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Добавить новый тип услуг</span>
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
                                    @foreach($prices_types as $prices_type)
                                        <tr id="{{$prices_type->id}}">
                                            <td>{{$prices_type->name}}</td>
                                            <td>{{$prices_type->created_at}}</td>
                                            <td class="no-sort no-click" id="bread-actions">
                                                <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="{{$prices_type->id}}" id="delete1">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                                </a>
                                                <a href="#" id="edit" data-id="{{$prices_type->id}}" data-name="{{$prices_type->name}}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
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
                    <form action="{{ route('voyager.pricestypes.index') }}" id="delete_form" method="POST">
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
                    <h4 class="modal-title"><i class="voyager-wand"></i>Добавление нового типа услуг</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.pricestypes.index') }}" id="add_form" method="POST">
                        {{ method_field("POST") }}
                        {{ csrf_field() }}
                        <input type="text" name="name" class="form-control" style="margin-bottom: 10px">
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
                    <h4 class="modal-title"><i class="voyager-wand"></i>Редактирование нового типа услуг</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.pricestypes.index') }}" id="edit_form" method="POST">
                        {{ method_field("POST") }}
                        {{ csrf_field() }}
                        <input type="text" name="name" id="edit-name-input" class="form-control" style="margin-top: 10px" >
                        <input type="hidden" name="id" id="edit-id-input" class="form-control" >
                        <input type="submit" id="edit_new" class="btn btn-danger pull-right add-confirm"
                               value="Изменить">
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
        $(document).on('click', '#add_new', function (e) {
            e.preventDefault();
            var data = $('#add_form').serialize();
            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{{ route("voyager.pricestypes.store") }}',
                data: data,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#add_modal').modal('hide');
                        window.location.replace("{{ route("voyager.pricestypes.index") }}");
                    }
                }
            })
        });
        var url = '';
        $(document).on('click', '#edit', function (e){
            var form = $('#edit_form')[0];
            $('#edit-id-input').val($(this).attr("data-id"));
            $('#edit-name-input').val($(this).attr("data-name"));
            url = '/admin/pricestypes/' + $(this).attr("data-id");
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
                        window.location.replace("{{ route("voyager.pricestypes.index") }}");
                    }
                }
            })
        });
        //        btn-add-new
    </script>
@stop