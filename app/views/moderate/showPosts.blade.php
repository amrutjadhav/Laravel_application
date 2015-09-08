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

<div class="page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Abuse Report</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            @if($post->is_published != 0)
                            <a class="btn ink-reaction btn-floating-action btn-warning" href="{{route('moderateDeclinePost', array('id' => $post->id))}}"><i class="fa fa-times"></i></a>
                            @else
                            <a class="btn ink-reaction btn-floating-action btn-primary" href="{{route('moderateApprovePost', array('id' => $post->id))}}"><i class="fa fa-check"></i></a>
                            @endif

                            <a class="btn ink-reaction btn-floating-action btn-info" href="{{route('moderateEditPost', array('id' => $post->id))}}"><i class="fa fa-edit"></i></a>

                            <a class="btn ink-reaction btn-floating-action btn-danger" href="{{route('moderateDeletePost',array('id' => $post->id))}}"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>
                            @if($post->report_flag != 0)
                                --
                            @else
                                {{$post->report_msg}}
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="right" id="paglink"><?php echo $posts->links(); ?></div>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>

</div>
</div>


@stop