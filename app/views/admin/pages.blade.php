<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 04/12/15
 * Time: 3:56 PM
 */?>

@extends('admin.adminLayout')

@section('content')

    @include('notification.notify')

    <div class="page">

        <div class="col-md-12">
            <div class="card">
                <div class="card-head style-primary">
                    <header>{{ tr('pages')}}</header>
                </div>
                <div class="card-body">

                    <form class="form" action="{{route('adminPagesProcess')}}" method="post">

                        <div class="form-group floating-label">
                            <select id="select2" name="type" class="form-control">
                                <option value="">&nbsp;</option>
                                <option value="about">About Us</option>
                                <option value="terms">Terms and Condition</option>
                                <option value="privacy">Privacy</option>
                            </select>
                            <label for="select2">Select</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="regular1" name="heading">
                            <label for="regular1">{{ tr('heading') }}</label>
                        </div>

                        <div class="form-group">
                            <label for="regular1">{{ tr('description') }}</label>
                        </div>

                        <textarea id="ckeditor" name="description" class="form-control control-12-rows" placeholder="Enter text ..."></textarea>
                        <br>

                        <button type="submit" class="btn ink-reaction btn-raised btn-info">
                            {{ tr('admin_submit') }}
                        </button>
                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->

        </div>



    </div>
    </div>

@stop

