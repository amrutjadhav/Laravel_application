<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 25/7/15
 * Time: 1:28 PM
 */
?>

@extends('moderate.moderateLayout')

@section('content')

    @include('notification.notify')

    <div class="page">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" action="{{route('moderateAddPostProcess')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="title" value="{{{$post->title}}}">
                            <label for="regular1">Title</label>
                        </div>
                        <input type="hidden" name="id" value="{{{$post->id}}}">

                        <div class="input-field col s12 check-box-inline">
                            <?php foreach($category as $cat) {?>
                            <p> <input type="checkbox" name="category[{{$cat->id}}]" value="{{$cat->id}}" id="test{{$cat->id}}" />
                                <label for="test{{$cat->id}}">{{$cat->name}}</label>
                            </p>
                            <?php } ?>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="url" value="{{{$post->url}}}">
                            <label for="regular1">URL</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn light-blue accent-2" style="padding: 0px 10px;">
                                <span>Choose Picture</span>
                                <input type="file" name="post_img" />
                            </div>
                            <input class="file-path validate" type="text"/>

                        </div>

                        <div class="form-group">
                            <textarea name="des" id="textarea1" class="form-control" rows="3">{{{$post->des}}}</textarea>
                            <label for="textarea1">Description</label>
                        </div>

                        <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>



    </div>
    </div>


@stop