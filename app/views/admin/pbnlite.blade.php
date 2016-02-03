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
                    <th>{{ tr('admin_action')}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pbnlites as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td style="width: 297px;">
                                <a title="View Post" class="btn ink-reaction btn-floating-action btn-danger" href="{{route('adminDeletePbnLite', array('id' => $post->id))}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-head style-primary">
                    <header>{{ tr('posts') }}</header>
                </div>
            <div class="card-body">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>{{tr('select')}}</th>
                        <th>{{ tr('admin_id')}} {{Auth::user()->id}}</th>
                        <th>{{ tr('title') }}</th>
                        <th>{{ tr('description')}}</th>
                        <th>{{ tr('time') }}</th>
                        <th>{{ tr('roles') }}</th>
                        <th>{{ tr('author_name') }}</th>
                        <th>{{ tr('admin_action')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    <form class="form" action="{{route('pbnliteProcess')}}" method="post" enctype="multipart/form-data" id="autoform">
                    @foreach($posts as $post)
                    
                        <tr>
                            <td> 
                            <div class="checkbox checkbox-styled">
                            <label>
                                <input type="checkbox" name="post[{{$post->id}}]" value="{{$post->id}}" id="test{{$post->id}}" />
                                <span></span>
                            </label>
                        </div></td>

                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{substr($post->des, 0, 50)}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <?php $user = User::where('id',$post->user_id)->first(); ?>
                            <td>
                                <?php
                                    if($user)
                                    {
                                        if($user->role_id == 1)
                                        {
                                            echo "Moderator";
                                        }
                                        elseif($user->role_id == 3)
                                        {
                                            if($post->is_approved == 0){
                                            echo "Contributor<br> <em>(Waiting for Approval)</em>";}else{ echo "Contributor"; }
                                        }
                                        else
                                        {
                                            echo "Admin";
                                        }
                                    }
                                    else
                                    {
                                        echo "";
                                    }
                                ?>
                            </td>
                            <td>{{{$post->author}}}</td>
                            <td style="width: 297px;">
                                
                                @if($post->is_approved ==1)
                                    <a target="_blank" title="View Post" class="btn ink-reaction btn-floating-action btn-info" href="{{route('adminViewPost', array('id' => $post->share_cat,'data' => $post->link))}}"><i class="fa fa-eye"></i></a>
                                @else
                                    <a target="_blank" title="View Post" class="btn ink-reaction btn-floating-action btn-info" href="{{route('adminViewPost', array('id' => $post->share_cat,'data' => $post->link))}}" disabled><i class="fa fa-eye"></i></a>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn ink-reaction btn-raised btn-primary pull-left">{{tr('admin_submit')}}</button>
                </form>
                <div align="right" id="paglink"><?php echo $posts->links(); ?></div>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{route('pbnDate')}}" method="get" >
                    <div class="input-group date" id="demo-date">
                        <div class="input-group-content">
                            <input type="text" class="form-control" name="selected_date">
                            <label>Select Date</label>
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                     <button type="submit" class="btn ink-reaction btn-raised btn-primary pull-left">{{tr('admin_submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>


   

@stop