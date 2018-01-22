@extends('voyager::master')

@section('page_title', __('voyager.generic.view').' ')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-file-text"></i> {{ __('voyager.generic.viewing') }}  &nbsp;

        @can('edit', app("TCG\Voyager\Models\Page"))
            <a href="{{ route('voyager.test.edit', $sheets->id) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager.generic.edit') }}
            </a>
        @endcan
        <a href="{{ route('voyager.test.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager.generic.return_to_list') }}
        </a>
    </h1>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                </div>
            </div>
        </div>
    </div>
@stop