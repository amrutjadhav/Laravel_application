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
            <div class="card-head style-primary">
                        <header>Website Settings</header>
                    </div>
            <div class="card-body">
                <form class="form" action="{{route('adminSettingProcess')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="sitename" value="{{Setting::get('sitename')}}">
                        <label for="regular1">Site Title</label>
                    </div>

                   <!--  <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="footer" value="{{Setting::get('footer')}}">
                        <label for="regular1">Footer</label>￼
                    </div> -->

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

                    <div class="form-group">
                        <input type="text" class="form-control" name="browser_key" value="{{Setting::get('browser_key')}}">
                        <label for="regular1">Browser Key</label>
                    </div>

                    <div class="form-group">
                      <textarea id="textarea1" class="materialize-textarea" name="analytics_code">{{Setting::get('analytics_code')}}</textarea>
                      <label for="textarea1">Google Analytics Code</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="google_play" value="{{Setting::get('google_play')}}">
                        <label for="regular1">Google play store link</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="ios_app" value="{{Setting::get('ios_app')}}">
                        <label for="regular1">Apple app store link</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="website_link" value="{{Setting::get('website_link')}}">
                        <label for="regular1">Website link</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="mandrill_secret" value="{{Setting::get('mandrill_secret')}}">
                        <label for="regular1">Mandrill Secret</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="mandrill_username" value="{{Setting::get('mandrill_username')}}">
                        <label for="regular1">Mandrill Username</label>
                    </div>


                    <button type="submit" class="btn ink-reaction btn-raised btn-info">Submit</button>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>



</div>
</div>


@stop