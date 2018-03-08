@extends('voyager::master')

@section('page_title', 'Редактирование страницы Контакты')

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
        {{ __('voyager.generic.edit').' Страницу Контакты ' }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="{{ route('voyager.contacts.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                {{--<div class="col-md-8">--}}
                    {{--<div class="panel">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title">--}}
                                {{--<i class="voyager-character"></i> Контент--}}
                            {{--</h3>--}}
                            {{--<div class="panel-actions">--}}
                                {{--<a class="panel-action panel-collapsed voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body" style="display: none;">--}}
                            {{--<textarea class="form-control custom-mce" id="" name="text_1" style="border: 0px;"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}
                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Свойства</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Номера телефона, через запятую</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"  data-slug-origin="title" data-slug-forceupdate="true" value="">
                            </div>
                            <div class="form-group">
                                <label for="name">Статус публикации</label>
                                <select class="form-control" name="status">
                                    <option value="1">Опубликовано</option>
                                    <option value="0"> Черновик</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Категория статьи</label>
                                <select class="form-control" name="category">
                                    <option value="1" >Новости</option>
                                    <option value="2" >Услуга</option>
                                    <option value="3" >Заболевания</option>
                                </select>
                            </div>
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