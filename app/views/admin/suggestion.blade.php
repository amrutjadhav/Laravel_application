<?php
/**
 * Created by PhpStorm.
 * User: yokesh
 * Date: 2/8/15
 * Time: 4:31 PM
 */
?>

@extends('admin.adminLayout')

@section('content')

<div class="page">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Cast Name</th>
                        <th>Movie Name</th>
                        <th>Role</th>
                        <th>Discription</th>
                        <th>Approve / Decline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suggestion as $suggest)
                    <tr>
                        <td>{{$suggest->id}}</td>
                        <td>{{$suggest->username}}</td>
                        <td>{{$suggest->movie_name}}</td>
                        <td>{{$suggest->role}}</td>
                        <td>{{$suggest->des}}</td>
                        <td>
                           @if($suggest->accepted != 0)
                                <a class="btn ink-reaction btn-floating-action btn-warning" href="{{route('adminSuggestionDecline', array('id' => $suggest->id))}}"><i class="fa fa-times"></i></a>
                            @else
                                <a class="btn ink-reaction btn-floating-action btn-primary" href="{{route('adminSuggestionActivate', array('id' => $suggest->id))}}"><i class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="right" id="paglink"><?php echo $suggestion->links(); ?></div>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>
</div>

@stop