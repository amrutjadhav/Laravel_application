<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 08/12/15
 * Time: 1:14 PM
 */?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">

        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{tr('edit_category') }}</header>
                </div>
                <div class="card-body">
                    <form class="form" action="{{route('editPageProcess')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$pages->id}}">

                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="heading" value="{{$pages->heading}}">
                            <label for="regular1">{{ tr('heading') }}</label>
                        </div>

                        <div class="form-group">
                            <label for="regular1">{{ tr('description') }}</label>
                        </div>

                        <textarea id="ckeditor" name="description" class="form-control control-12-rows" placeholder="Enter text ...">{{$pages->description}}</textarea>
                        <br>

                        <button type="submit" class="btn ink-reaction btn-raised btn-info">
                            {{tr('admin_submit')}}
                        </button>
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
            <li><a class="btn-floating yellow darken-1" href="{{route('adminCategory')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

            <li><a class="btn-floating blue" href="{{route('addCategory')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

        </ul>
    </div>
@stop
