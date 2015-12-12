<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 12/12/15
 * Time: 12:49 PM
 */?>
@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">

        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{ tr('add_publisher') }}</header>
                </div>
                <div class="card-body">

                    <form class="form" action="{{route('addPublisherProcess')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="name">
                            <label for="regular1">{{ tr('category_name') }}</label>
                        </div>

                        <div class="file-field input-field col s12">
                            <div class="btn light-blue accent-2" style="padding: 0px 10px;">
                                <span>{{ tr('choose_picture') }}</span>
                                <input type="file" name="cat_img" />
                            </div>
                            <input class="file-path validate" type="text"/>

                        </div>

                        <button type="submit" class="btn ink-reaction btn-raised btn-info">
                            {{ tr('admin_submit')}}
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
            <li><a class="btn-floating yellow darken-1" href="{{route('publisher')}}" style="trform: scaleY(0.4) scaleX(0.4) trlateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

            <li><a class="btn-floating blue" href="{{route('addPublisher')}}" style="trform: scaleY(0.4) scaleX(0.4) trlateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

        </ul>
    </div>
@stop
