@extends('voyager::master')

@section('page_title', __('voyager.generic.add').' страницу')

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
        {{ __('voyager.generic.add').' страницу ' }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="{{ route('voyager.doctor.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> Имя
                                {{--<span class="panel-desc">Имя Фамилия</span>--}}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-up" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body" style="">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Название" value="{{Request::old('firstName')}}">
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i>Фамилия
                                {{--<span class="panel-desc">Имя Фамилия</span>--}}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-up" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body" style="">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Название" value="{{Request::old('lastName')}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>Краткое описание</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Описание</label>
                                <textarea class="form-control" name="description">{{Request::old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" onclick="BrowseServer('id_of_the_target_input');">Выберите изображение</button>
            <input type="hidden" name="photo" id="id_of_the_target_input"/>
            <button type="submit" class="btn btn-primary pull-right">Обновить</button>
        </form>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
        // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
        var urlobj;

        function BrowseServer(obj)
        {
            urlobj = obj;
            OpenServerBrowser(
                '/laravel-filemanager?type=Images',
                screen.width * 0.7,
                screen.height * 0.7 ) ;
        }

        function OpenServerBrowser( url, width, height )
        {
            var iLeft = (screen.width - width) / 2 ;
            var iTop = (screen.height - height) / 2 ;
            var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
            sOptions += ",width=" + width ;
            sOptions += ",height=" + height ;
            sOptions += ",left=" + iLeft ;
            sOptions += ",top=" + iTop ;
            var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
        }

        function SetUrl( url, width, height, alt )
        {
            document.getElementById(urlobj).value = url ;
            oWindow = null;

        }
        $(document).ready(function(){
            $(".form-edit-add").unbind('submit');
        });
    </script>
@stop