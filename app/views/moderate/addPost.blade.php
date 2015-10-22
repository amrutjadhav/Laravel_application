<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 25/7/15
 * Time: 1:28 PM
 */
?>

@extends('moderate.moderateLayout')

@section('content')

@include('notification.notify')

<div class="page">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a class="btn ink-reaction btn-raised btn-primary" href="{{route('moderatePost')}}">BACK</a>
                </div>
                <form class="form" action="{{route('moderateAddPostProcess')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="title" >
                        <label for="regular1">Title</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="author" value="{{{$details->author_name}}}">
                        <label for="regular1">Author</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="publisher" >
                        <label for="regular1">Publisher</label>
                    </div>

                    <div class="input-field col s12 check-box-inline">
                        <?php foreach($category as $cat) {?>
                            <p> <input type="checkbox" name="category[{{$cat->id}}]" value="{{$cat->id}}" id="test{{$cat->id}}" />
                                <label for="test{{$cat->id}}">{{$cat->name}}</label>
                            </p>
                        <?php } ?>
                        <br><br>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="url" >
                        <label for="regular1">URL</label>
                    </div>
                    <div class="file-field input-field col s12">
                            
                        <div class="btn light-blue accent-2" style="padding: 0px 10px;">
                            <span>Choose Picture</span>
                            <input type="file" name="post_img" />
                        </div>
                        <input class="file-path validate" type="text"/>

                    </div>

                    <div class="form-group">
                        <textarea name="des" id="textarea1" class="form-control" maxlength="450" rows="3"></textarea>
                        <label for="textarea1">Description</label>
                    </div>

                    <div class="row">


                        <h4>Permalink</h4>

                        <div class="form-group col-md-3 col-sm-4">

                            <h5>{{URL::to('/')}}</h5>

                        </div>

                        <div class="form-group floating-label col-md-4 col-sm-4" style="padding-left: 0px;">
                            <select id="select2" name="share_cat" class="form-control">
                                <option value="">&nbsp;</option>
                                <?php foreach($category as $cat) {?>
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                                <?php } ?>
                            </select>
                            <label for="select2">Select</label>
                        </div>

                        <div class="form-group col-md-5 col-sm-4" style="padding-left: 0px;">

                            <input type="text" class="form-control" name="share_link" >
                            <label for="regular1">Permalink</label>

                        </div>

                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" id="title_tag" name="title_tag" maxlength="70">
                        <label for="regular1">Title Tag</label>
                        <div id="characterLeft"></div>

                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="meta_des" name="meta_des" >
                        <label for="regular1">Meta Description</label>
                    </div>

                    <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->

    </div>



</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$('#characterLeft').text('70 characters left');
$('#title_tag').keyup(function () {
    var max = 70;
    var len = $(this).val().length;
    if (len >= max) {
        $('#characterLeft').text(' you have reached the limit');
    } else {
        var ch = max - len;
        $('#characterLeft').text(ch + ' characters left');
    }
});

</script>
@stop





