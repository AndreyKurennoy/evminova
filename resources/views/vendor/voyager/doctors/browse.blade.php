@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Врачи')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Врачи
        </h1>
        @can('add',app("TCG\Voyager\Models\Page"))
            <a href="{{ route('voyager.doctor.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Добавить</span>
            </a>
        @endcan
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--To display alert--}}
        {{--<div class="alerts">--}}
        {{--@foreach ($alerts as $alert)--}}
        {{--<div class="alert alert-{{ $alert->type }} alert-name-{{ $alert->name }}">--}}
        {{--@foreach()--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    {{--<th class="sorting">Id</th>--}}
                                    <th class="sorting">Имя</th>
                                    <th class="sorting">Фамилия</th>
                                    <th class="sorting">Описание</th>
                                    <th class="sorting">Фото</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr id="{{$doctor->id}}">
                                        <td>{{$doctor->firstName}}</td>
                                        <td>{{$doctor->lastName}}</td>
                                        <td>{{$doctor->description}}</td>
                                        <td><img src="{{$doctor->photo}}" style="width:100px"></td>
                                        <td class="no-sort no-click" id="bread-actions">
                                            <a href="#" title="Удалить" class="btn btn-sm btn-danger pull-right delete" data-id="{{$doctor->id}}" id="delete{{$doctor->id}}">
                                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                            </a>
                                            <a href="{{ route('voyager.doctor.edit', $doctor->id) }}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
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
                    <form action="{{ route('voyager.doctor.index') }}" id="delete_form" method="DELETE">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right"
                               value="{{ __('voyager.generic.delete_confirm') }}">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

<script>    var BASE_URL = "{{ route('voyager.test.show', 1) }}"; console.log(BASE_URL) </script>
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
            $("#delete_form").click(function (event) {
                event.preventDefault();

                var form = $('#delete_form')[0];
                $.ajax({
                    type: "DELETE",
                    url: form.action,
                    data: {'_token': $("input[name='_token']").val()},
                    success: function (response) {
                        window.location.replace("/admin/doctor");
                    }
                });
            });
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
            // form.method = 'DELETE';

            $('#delete_modal').modal('show');
        });
    </script>
@stop