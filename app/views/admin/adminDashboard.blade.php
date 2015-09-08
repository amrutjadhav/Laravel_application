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

<!-- BEGIN OFFCANVAS RIGHT -->
<div id="content">

    <!-- BEGIN BLANK SECTION -->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">

            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <h1 class="pull-right text-success"><i class="md md-photo"></i></h1>
                                <strong class="text-xl">{{{$post_count}}}</strong><br>
                                <span class="opacity-50">Total Posts</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-warning no-margin">
                                <h1 class="pull-right text-success"><i class="md md-person"></i></h1>
                                <strong class="text-xl">{{{$moderate_count}}}</strong><br>
                                <span class="opacity-50">Total Users</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div>

        </div><!--end .section-body -->
    </section>

    <!-- BEGIN BLANK SECTION -->
</div><!--end #content-->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="md md-star" style="font-size: 25px;line-height: 65px;"></i>
    </a>
    <ul>
        <li><a class="btn-floating green" href="{{route('adminModeratorManagement')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-person" style="line-height:40px;"></i></a></li>

        
        <li><a class="btn-floating blue" href="{{route('adminCategory')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-loyalty" style="line-height:40px;"></i></a></li>

    </ul>
</div>


@stop