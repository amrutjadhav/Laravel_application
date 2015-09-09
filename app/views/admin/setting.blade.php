<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 19/7/15
 * Time: 4:06 PM
 */
?>


@extends('admin.adminLayout')

@section('content')

@include('notification.notify')

<div class="page">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{route('adminSettingProcess')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="sitename" value="{{Setting::get('sitename')}}">
                        <label for="regular1">Site Title</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="footer" value="{{Setting::get('footer')}}">
                        <label for="regular1">Footer</label>￼
                    </div>

                    <div class="file-field input-field col s12">
                        <div class="tile-content">
                                <div class="tile-icon brand-logo">
                                    <img  src="{{Setting::get('logo')}}" alt="">
                                </div>
                            </div>
                        <div class="btn light-blue accent-2" style="padding: 0px 10px;">
                            <span>Choose Logo</span>
                            <input type="file" name="picture" />
                        </div>
                        <input class="file-path validate" type="text"/>

                    </div>

                    <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>



</div>
</div>


@stop