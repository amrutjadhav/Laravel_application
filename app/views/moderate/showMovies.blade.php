<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 9/7/15
 * Time: 11:59 PM
 */
?>
@extends('moderate.moderateLayout')

@section('content')

@include('notification.notify')

<div class="page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Director</th>
                        <th>Writer</th>
                        <th>Producer</th>
                        <th>Music</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie->id}}</td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->des}}</td>
                        <td>{{$movie->director}}</td>
                        <td>{{$movie->writter}}</td>
                        <td>{{$movie->producer}}</td>
                        <td>{{$movie->music}}</td>
                        <td>

                            <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('moderateEditMovie', array('id' => $movie->id))}}"><i class="fa fa-edit"></i></a>

                            <a class="btn ink-reaction btn-floating-action btn-danger" href="{{route('moderateDeleteMovie',array('id' => $movie->id))}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="right" id="paglink"><?php echo $movies->links(); ?></div>
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

        <li><a class="btn-floating blue" href="{{route('moderateAddMovies')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

    </ul>
</div>


@stop