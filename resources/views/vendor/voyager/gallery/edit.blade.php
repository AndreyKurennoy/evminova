@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Галерея')
@section('css')
    <style>
        .admin-certificate{
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            max-width: 45%;
            padding-right: 10px;
        }
        .img-preview img{
            width: 100px;
            padding-right: 10px;
        }
        .page-content{
            margin-left: 20px;
        }
        .remove_field{
            color: red;
            padding-left: 5px;
        }
        .alt-img{
            padding-right: 10px;
            margin-bottom: 5px;
        }
        .input_fields_wrap{
            display: flex;
            flex-wrap: wrap;
        }
    </style>
@stop

@section('content')
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
    <div class="page-content browse container-fluid">
        <div class="row">
            <form class="form-edit-add" role="form" action="{{ route('voyager.gallery.update', $sheets->id) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        {{ csrf_field() }}
                        {{ method_field("PUT") }}
                        <input type="hidden" name="category_name" value="gallery">
                        <button class=" btn btn-primary add_field_button">Добавить изображение</button>
                        <div class="input_fields_wrap">

                            {{--<div class="certificate-container">--}}
                            @foreach($photos as $photo)
                                <div class="admin-certificate">
                                    <div class="img-preview">
                                        <img src="{{$photo->name}}" id="prev_img_{{$loop->index}}" alt="">
                                    </div>
                                    <input class="certificate-img-admin" id="input_{{$loop->index}}" type="hidden" name="photo[]" value="{{$photo->name}}"/>
                                    <div>
                                        <input class="alt-img form-control" type="text" name="alt[]" placeholder="Alt картинки" value="{{$photo->alt}}">
                                        <input class="alt-description form-control" type="text" name="description[]" placeholder="Мини-описание картинки" value="{{$photo->description}}">
                                        <button style="display: block; margin-top: 5px;" class="btn btn-primary" type="button" data-img="prev_img_{{$loop->index}}" data-id="input_{{$loop->index}}" onclick="BrowseServer(this);">Выбрать</button></div>
                                </div>
                            @endforeach
                            {{--</div>--}}
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- ### SEO CONTENT ### -->
                        <div class="panel panel-bordered panel-info">
                            <input type="hidden" name="slug" value="certificates">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon wb-search"></i>SEO информация</h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="name">Url</label>
                                    <input class="form-control" name="slug" value="@if(Request::old('slug')){{Request::old('slug')}}@elseif(isset($sheets->slug)){{$sheets->slug}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="name">Описание (meta)</label>
                                    <textarea class="form-control" name="meta_description">@if(Request::old('meta_description')){{Request::old('meta_description')}}@elseif(isset($sheets->meta_description)){{$sheets->meta_description}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Ключевые слова (meta)</label>
                                    <textarea class="form-control" name="meta_keywords">@if(Request::old('meta_keywords')){{Request::old('meta_keywords')}}@elseif(isset($sheets->meta_keywords)){{$sheets->meta_keywords}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">SEO название</label>
                                    <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="@if(Request::old('seo_title')){{Request::old('seo_title')}}@elseif(isset($sheets->seo_title)){{$sheets->seo_title}}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="name">Тайтл</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="@if(Request::old('title')){{Request::old('title')}}@elseif(isset($sheets->title)){{$sheets->title}}@endif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="float: right" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            var max_fields      = 40; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = '1'; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed

                    $(wrapper).append('<div class="admin-certificate">                        <div class="img-preview">\n' +
                        '                            <img id="prev_img_'+ x+'" src="/images/0-img.jpg" alt="">\n' +
                        '                        </div><input class="certificate-img-admin" id="input_'+ x +'" type="hidden" name="photo[]" value=""/>\n' +
                        '<div><input class="alt-img form-control" type="text" name="description[]" placeholder="Мини-описание картинки" value="">' +
                        '         <input class="alt-img form-control" type="text" name="alt[]">               <button style="display: block; margin-top: 5px;" class="btn btn-primary" type="button" data-img="prev_img_'+ x +'" data-id="input_'+ x +'" onclick="BrowseServer(this);">Выбрать</button><a href="#" class="remove_field">Удалить</a></div></div>'); //add input box
                }
                x++; //text box increment
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            });


        });

        var urlobj;
        var urlimg;
        function BrowseServer(obj)
        {
            urlobj = jQuery(obj).attr('data-id');
            urlimg = jQuery(obj).attr('data-img');
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
            document.getElementById(urlimg).src = url ;
            jQuery('#img-success').show();
            oWindow = null;
        }
    </script>
@stop