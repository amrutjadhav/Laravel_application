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
            <div class="card-head style-primary">
                <header>{{ tr('pbn_lite') }}</header>
            </div>
            <div class="card-body">
                <table class="table no-margin">
                <thead>
                <tr>
                    <th>{{ tr('admin_id')}}</th>
                    <th>{{ tr('title') }}</th>
                    <th>{{tr('time')}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pbnlites as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@stop