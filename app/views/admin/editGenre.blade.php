<?php
/**
 * Created by PhpStorm.
 * User: yokesh
 * Date: 2/8/15
 * Time: 4:35 PM
 */

?>


@extends('admin.adminLayout')

@section('content')

@include('notification.notify')

<div class="page">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{route('adminEditGenreProcess')}}" method="post">
                    <input type="hidden" name="id" value="{{$subcat->id}}">
                    <div class="form-group floating-label">
                        <select id="select2" name="sub_cat" class="form-control">
                            <option value="">&nbsp;</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" <?php if($subcat->id == $category->id) echo "selected"; ?>>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="select2">Select</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="name" value="{{$subcat->name}}">
                        <label for="regular1">Name</label>
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
        <li><a class="btn-floating yellow darken-1" href="{{route('adminGenre')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

        <li><a class="btn-floating blue" href="{{route('adminAddGenre')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

    </ul>
</div>
@stop