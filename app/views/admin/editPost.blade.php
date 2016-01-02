<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 25/7/15
 * Time: 1:28 PM
 */
?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">
    <form class="form" action="{{route('adminEditProcess')}}" method="post" enctype="multipart/form-data" id="autoform">
        <div class="col-md-8">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{tr('update_post')}}</header>
                </div>
                <div class="card-body">
                    <div class="text-right">
                        <a class="btn ink-reaction btn-raised btn-primary" href="{{route('adminPost')}}">{{ tr('back') }}</a>
                    </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required id="regular1" name="title" value="{{{$post->title}}}">
                            <label for="regular1">{{ tr('title') }}</label>
                        </div>


                    <div class="form-group">
                        <select name="publishers" class="form-control" required>
                            <option value="">{{ tr('select_publisher') }}</option>
                            @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}" <?php if($post->publisher_id == $publisher->id) echo "selected" ?> >{{$publisher->name}}</option>
                            @endforeach

                        </select>
                        <label for="pub_select">{{ tr('select') }}</label>
                    </div>


                    <input type="hidden" name="id" value="{{{$post->id}}}" id="post_id">


                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" required name="url" value="{{{$post->url}}}">
                            <label for="regular1">{{ tr('url') }}</label>
                        </div>

                        <div class="file-field input-field col s12">
                            <div class="tile-content">
                                <div class="tile-icon">
                                    <img src="{{$post->image}}" required alt="" style="height:300px;margin:10px;">
                                </div>
                            </div>

                            <div class="btn btn-primary light-blue accent-2"  style="padding: 0px 10px;">
                                <span>{{ tr('choose_picture') }}</span>
                                <input type="file" name="post_img" />
                            </div>

                            <input class="file-path validate" type="text" value="{{$post->image}}"/>

                        </div>

                        <div class="form-group">
                            <textarea name="des" id="textarea1" required class="form-control" maxlength="450" rows="3">
                                {{{$post->des}}}
                            </textarea>
                            <label for="textarea1">{{ tr('description') }}</label>
                        </div>

                        @if($contributor == 1)

                            <div class="row">


                                <h4>{{tr('permalink')}}</h4>

                                <div class="form-group col-md-3 col-sm-4">

                                    <h5>{{URL::to('/')}}</h5>

                                </div>

                                <div class="form-group floating-label col-md-4 col-sm-4" style="padding-left: 0px;">
                                    <select id="cat_select" name="share_cat" class="form-control" required>
                                        <option value="">{{ tr('select_category') }}</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}" <?php if($post->share_cat == $cat->id) echo "selected"; ?>>{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                    <label for="cat_select">{{ tr('select') }}</label>

                                </div>

                                <div class="form-group col-md-5 col-sm-4" style="padding-left: 0px;">

                                    <input type="text" class="form-control" name="share_link" id="meta_title" value="{{{seo_url($post->share_title)}}}">
                                    <label for="meta_title">{{ tr('permalink') }}</label>

                                </div>

                            </div>

                        @endif

                        <div class="form-group">

                            <input type="text" class="form-control" id="title_tag" name="title_tag" maxlength="70" value="{{$post->title_tag}}">
                            <label for="regular1">Title Tag</label>
                            <div id="characterLeft"></div>

                        </div>

                        <div class="form-group">
                            <input type="text" required class="form-control" id="meta_des" name="meta_des" value="{{$post->meta_des}}">
                            <label for="regular1">{{ tr('meta_description') }}</label>
                        </div>


                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                        <div class="pub-btn">
                    <button type="submit" class="btn ink-reaction btn-raised btn-info fst">
                        {{ tr('publish') }}
                    </button>

                    <button type="button" id="draft_button" class="btn ink-reaction btn-raised btn-warning btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> {{ tr('saving_draft') }}...">{{ tr('save_draft') }}</button>
                    </div>

                        <br><br>

                        <div class="input-group date" id="demo-date">
                                <div class="input-group-content">
                                     <input type="text" class="form-control" required name="pub_date" value="{{date('m/d/Y',strtotime($post->created_at))}}">
                                    <label>{{ tr('publish_date') }}</label>
                                </div>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control time-mask" required id="pub" name="pub_time" value="{{{date('H:m',strtotime($post->created_at))}}}">
                            <label for="regular1">Change {{ tr('publish_time') }}</label>
                        </div>

                        <div class="form-group">
                            <select id="select1" required name="author" class="form-control">
                                <option value="">&nbsp;</option>
                                @foreach($authors as $author)
                                @if($author->author_name != "")
                                <option value="{{$author->author_name}}" <?php if($post->author == $author->author_name) echo "selected"; ?>>{{$author->author_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            <label for="select1">{{ tr('author_name') }}</label>
                        </div>

                        <div class="input-field col s12 check-box-inline">
                            <?php foreach($category as $cat) {?>
                            <p> <input type="checkbox"  name="category[{{$cat->id}}]" value="{{$cat->id}}" id="test{{$cat->id}}" <?php if(in_array($cat->id, $cate)) echo "checked"; ?> />
                                <label for="test{{$cat->id}}">{{$cat->name}}</label>
                            </p>
                            <?php } ?>
                            <br><br>
                        </div>

                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>
        
        </form>

    </div>
    </div>

<script src="{{asset('admins/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            var typingTimer;                //timer identifier
            var doneTypingInterval = 2000;  //time in ms, 5 second for example
            var $input = $('.form-control');

            //on keyup, start the countdown
            $input.on('keyup', function () {
              clearTimeout(typingTimer);
              typingTimer = setTimeout(doneTyping, doneTypingInterval);
            });

            //on keydown, clear the countdown 
            $input.on('keydown', function () {
              clearTimeout(typingTimer);
            });

            function doneTyping () {
              //do something
            var route_url = "{{route('auto_save_form')}}";
            $('#draft_button').prop('disabled', false);
            $('#draft_button').text('Save Draft');

            // setInterval(function() {
                var form_data = $("#autoform").serialize();
                $('#draft_button').prop('disabled', true);
                $('#draft_button').html("<i class='fa fa-spinner fa-spin'></i> Saving Draft...");
                $.ajax({
                    type: 'POST',
                    data:  form_data,
                     cache: false,
                    url: route_url,
                    success: function(datas){
                        console.log(datas);
                        $('#post_id').val(datas.new_id);
                        setTimeout( function() {
                            $('#draft_button').prop('disabled', false);
                            $('#draft_button').text('Save Draft');
                        }, 2000);
                    }
                });
            // }, 10000);

            }

        });
    </script>


@stop

