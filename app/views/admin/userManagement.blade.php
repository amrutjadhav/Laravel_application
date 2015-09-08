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

<div class="page">
<div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->gender}}</td>
                                                    <td>
                                                    <a class="btn ink-reaction btn-floating-action btn-danger" href="{{route('adminUserDelete',array('id' => $user->id))}}"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div align="right" id="paglink"><?php echo $users->links(); ?></div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                              
                            </div>

                    </div>
</div>
@stop