<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 9/7/15
 * Time: 11:59 PM
 */
?>
@extends('admin.adminLayout')

@section('content')

@include('notification.notify')

<div class="page">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{route('editMovieProcess')}}" method="post">
                    <input type="hidden" name="id" value="{{$movie->id}}"/>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" value ="{{$movie->title}}">
                        <label for="regular1">Title</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="producer" name="producer" value ="{{$movie->producer}}">
                        <label for="producer">Producer</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="director"name="director" value ="{{$movie->director}}">
                        <label for="director">Director</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="writer"name="writer" value ="{{$movie->writter}}">
                        <label for="writer">Writer</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="music"name="music" value ="{{$movie->music}}">
                        <label for="music">Music</label>
                    </div>
                    <div class="form-group">
                        <textarea name="des" id="textarea1" class="form-control" rows="3"><?php echo $movie->des; ?></textarea>
                        <label for="textarea1">Description</label>
                    </div>
                    <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>



</div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="md md-person" style="font-size: 25px;line-height: 65px;"></i>
    </a>
    <ul>

        <li><a class="btn-floating yellow darken-1" href="{{route('adminModeratorManagement')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

        <li><a class="btn-floating blue" href="{{route('addCast')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

    </ul>
</div>
@stop