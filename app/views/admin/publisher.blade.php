<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 12/12/15
 * Time: 12:23 PM
 */?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">
        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{tr('publisher')}}</header>
                </div>
                <div class="card-body">

                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>{{tr('admin_id')}}</th>
                            <th>{{tr('category_name')}}</th>
                            <th>{{tr('admin_action')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <input type = "hidden" name="id[{{$publisher->id}}]" value = "{{$publisher->id}}">
                                    <td>{{$publisher->id}}</td>
                                    <td>{{$publisher->name}}</td>
                                    <td>
                                        {{--<a class="btn ink-reaction btn-floating-action btn-info" href="{{route('addpublisher')}}"><i class="fa fa-plus"></i></a>--}}
                                        <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('editPublisher', array('id' => $publisher->id))}}"><i class="fa fa-edit"></i></a>
                                    @if($publisher->id == 1)
                                    @else
                                        <a onclick="return confirm('Are you sure?')" class="btn ink-reaction btn-floating-action btn-danger" href="{{route('deletePublisher',array('id' => $publisher->id))}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    </td>

                                </tr>
                        <?php $i++; ?>
                        @endforeach
                        </tbody>

                    </table>

                    <div align="right" id="paglink"><?php echo $publishers->links(); ?></div>
                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="md md-star" style="font-size: 25px;line-height: 65px;"></i>
        </a>
        <ul>
            <li style="display: none"><a class="btn-floating yellow darken-1" href="{{route('publisher')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

            <li><a class="btn-floating blue" href="{{route('addPublisher')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

        </ul>
    </div>

@stop