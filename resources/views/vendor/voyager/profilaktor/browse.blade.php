@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Профилактор')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-file-text"></i> Раздел Профилактор
        </h1>
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
                                    <th class="sorting">Название</th>
                                    {{--<th class="sorting">Категория</th>--}}
                                    {{--<th class="sorting">Статус</th>--}}
                                    <th class="sorting">Дата изменения</th>
                                    <th class="sorting">Доступные действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sheets as $sheet)
                                    <tr id="{{$sheet->id}}">
                                        {{--<td>{{$sheet->id}}</td>--}}
                                        <td><div class="readmore" style="max-height: none;">{{$sheet->title}}</div></td>
                                        {{--<td>@if($sheet->category == 1)Новости @elseif($sheet->category == 2) Услуги @else Заболевания @endif</td>--}}
                                        {{--<td>@if($sheet->status == 1)Опубликовано @else Черновик @endif</td>--}}
                                        <td>{{$sheet->created_at}}</td>
                                        <td class="no-sort no-click" id="bread-actions">
                                            <a href="{{ route('voyager.profilaktor.edit', $sheet->id) }}" title="Изменить" class="btn btn-sm btn-primary pull-right edit">
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
@stop
