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
                <form class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1">
                        <label for="regular1">Regular input</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password1">
                        <label for="password1">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="placeholder1" placeholder="Placeholder">
                        <label for="placeholder1">Placeholder</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="help1">
                        <label for="help1">Input with help text</label>
                        <p class="help-block">Help text</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tooltip1" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Example input tooltip text here">
                        <label for="help1">Input with tooltip</label>
                    </div>
                    <div class="form-group">
                        <select id="select1" name="select1" class="form-control">
                            <option value="">&nbsp;</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                        </select>
                        <label for="select1">Select</label>
                    </div>
                    <div class="form-group">
                        <textarea name="textarea1" id="textarea1" class="form-control" rows="3" placeholder=""></textarea>
                        <label for="textarea1">Textarea</label>
                    </div>
                    <div class="form-group">
                        <label>Static control</label>
                        <p class="form-control-static">email@example.com</p>
                    </div>
                    <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>



</div>
</div>
@stop