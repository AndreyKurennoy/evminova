@extends('voyager::master')

@section('page_title', __('voyager.generic.add').' отзыв')

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
    <h1 class="page-title">
        <i class="voyager-news"></i>
        {{ __('voyager.generic.add').' отзыв ' }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="{{ route('voyager.guestbook.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                {{--<div class="col-md-8">--}}
                    {{--<!-- ### CONTENT ### -->--}}
                    {{--<div class="panel">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title"><i class="icon wb-book"></i>Контент страницы</h3>--}}
                            {{--<div class="panel-actions">--}}
                                {{--<a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<textarea class="form-control" name="body">{{Request::old('body')}}</textarea>--}}
                    {{--</div>--}}

                {{--</div>--}}
                <div class="col-md-8" style="float:none;margin: auto;">
                    <!-- ### DETAILS CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>Информация</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Имя автора</label>
                                <textarea class="form-control" name="name">{{Request::old('name')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Текст отзыва</label>
                                <textarea class="form-control" name="body">{{Request::old('body')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Проблема</label>
                                <textarea class="form-control" name="problem">{{Request::old('problem')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Email автора</label>
                                <textarea class="form-control" name="email">{{Request::old('email')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Статус публикации</label>
                                <select class="form-control" name="status">
                                    <option value="1" @if(old('status') == 1) selected @endif>Опубликовано</option>
                                    <option value="0" @if(old('status') == 0) selected @endif>Черновик</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            $(".form-edit-add").unbind('submit');
        });
    </script>
@stop