<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 04/12/15
 * Time: 7:01 PM
 */ ?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">
        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{tr('pages')}}</header>
                </div>
                <div class="card-body">

                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>{{tr('heading')}}</th>
                            <th>{{tr('description')}}</th>
                            <th>{{tr('page_type')}}</th>
                            <th>{{tr('admin_action')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->heading}}</td>
                                    <td>{{$page->description}}</td>
                                    <td>{{$page->type}}</td>
                                    <td>
                                        <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('editPage', array('id' => $page->id))}}"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure?')" class="btn ink-reaction btn-floating-action btn-danger" href="{{route('deletePage',array('id' => $page->id))}}"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="md md-star" style="font-size: 25px;line-height: 65px;"></i>
        </a>
        <ul>
            <li><a class="btn-floating yellow darken-1" href="{{route('viewPages')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

            <li><a class="btn-floating blue" href="{{route('adminPages')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

        </ul>
    </div>

@stop