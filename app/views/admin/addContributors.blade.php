<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 19/10/15
 * Time: 4:21 PM
 */?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">

        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                        <header>{{ tr('add_contributors')}}</header>
                    </div>
                <div class="card-body">
                    
                    <form class="form" action="{{route('addContributorsProcess')}}" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="first_name">
                            <label for="regular1">{{ tr('first_name') }}</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="last_name">
                            <label for="regular1">{{ tr('last_name') }}</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="author_name">
                            <label for="regular1">{{ tr('author_name') }}</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="password1" name="email">
                            <label for="password1">{{ tr('admin_email') }}</label>
                        </div>
                        <button type="submit" class="btn ink-reaction btn-raised btn-info">
                            {{ tr('admin_submit') }}
                        </button>
                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>



    </div>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="{{route('adminContributorsManagement')}}">
            <i class="md md-visibility" style="font-size: 25px;line-height: 65px;"></i>
        </a>
    </div>
@stop
