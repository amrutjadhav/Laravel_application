<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 25/7/15
 * Time: 1:28 PM
 */
?>

@extends('admin.adminLayout')

@section('content')

@include('notification.notify')

<div class="page">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{route('adminAddPostProcess')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regular1" name="title" >
                        <label for="regular1">Title</label>
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

                        <div class="avatar-view" title="Change the avatar">
                          <img src="{{asset('inshorts/crop/img/picture.jpg')}}">
                        </div>
                            
                        <!-- <div class="btn light-blue accent-2" style="padding: 0px 10px;">
                            <span>Choose Picture</span>
                            <input type="file" name="post_img" />
                        </div>
                        <input class="file-path validate" type="text"/> -->

                    </div>

                    <div class="form-group">
                        <textarea name="des" id="textarea1" class="form-control" rows="3"></textarea>
                        <label for="textarea1">Description</label>
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






<!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>


    <!------------thumbnail-end-------------------->

<script type="text/javascript" src="{{asset('inshorts/crop/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('inshorts/crop/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('inshorts/crop/js/cropper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('inshorts/crop/js/main.js')}}"></script>
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





