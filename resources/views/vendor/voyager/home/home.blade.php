@extends('voyager::master')

@section('page_title', 'Редактирование Главной страницы')

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
        {{ __('voyager.generic.edit').' Главную страницу ' }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="{{ route('voyager.home.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> Популярные процедуры
                                {{--<span class="panel-desc"> Название статьи</span>--}}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action panel-collapsed voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body" style="display: none;">
                            <textarea class="form-control richTextBox" id="richtextbody" name="text_1" style="border: 0px;">@if($text_1 = $options->where('option_name', 'text_1')->pluck('value')->first()) {{$text_1}}@endif</textarea>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> Ваш верный помощник в борьбе с недугами
                                {{--<span class="panel-desc"> Название статьи</span>--}}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action panel-collapsed voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body" style="display: none;">
                            <textarea class="form-control richTextBox" id="richtextbody" name="text_2" style="border: 0px;">@if($text_2 = $options->where('option_name', 'text_2')->pluck('value')->first()) {{$text_2}}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>SEO информация</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Описание (meta)</label>
                                <textarea class="form-control" name="meta_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Ключевые слова (meta)</label>
                                <textarea class="form-control" name="meta_keywords"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">SEO название</label>
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Обновить</button>
        </form>
    </div>
@stop