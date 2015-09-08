<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 2/8/15
 * Time: 4:31 PM
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
                        <th>User Name</th>
                        <th>Movie Name</th>
                        <th>Discription</th>
                        <th>Approve / Decline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{$review->id}}</td>
                        <td>{{$review->username}}</td>
                        <td>{{$review->title}}</td>
                        <td>{{$review->comment}}</td>
                        <td>
                           @if($review->is_approved != 0)
                                <a class="btn ink-reaction btn-floating-action btn-warning" href="{{route('moderateReviewDecline', array('id' => $review->id))}}"><i class="fa fa-times"></i></a>
                            @else
                                <a class="btn ink-reaction btn-floating-action btn-primary" href="{{route('moderateReviewAccept', array('id' => $review->id))}}"><i class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="right" id="paglink"><?php echo $reviews->links(); ?></div>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>
</div>

@stop