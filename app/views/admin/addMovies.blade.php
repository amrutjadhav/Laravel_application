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
            <div class="card-body">
                <form class="form" action="{{route('addMoviesProcess')}}" method="post" id="form1">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title">
                        <label for="regular1">Title</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="producer" name="producer">
                        <label for="producer">Producer</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="director"name="director">
                        <label for="director">Director</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="writer"name="writer">
                        <label for="writer">Writer</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="music"name="music">
                        <label for="music">Music</label>
                    </div>
                    <div class="form-group">
                        <textarea name="des" id="textarea1" class="form-control" rows="3" placeholder=""></textarea>
                        <label for="textarea1">Description</label>
                    </div>

                    <div class="card-body">
                        <div class="form-group">    
                            <label for="castTable">Add More Casts</label>
                        </div>

                    <div id="itemRows" class="form-group row">
                   
                      <div class="col-md-6">
                         <label>Cast</label>
                        <select class="form-control" name="cast[0]" data-style="btn-primary"><?php foreach($casts as $cast){?><option value="{{$cast->id}}"><?php echo $cast->username; ?></option>}<?php }?> </select> 
                      </div>


                      <div class="col-md-6"> 
                        <label>Role</label>
                        <input type="text" class="form-control" id="role[0]"name="role[0]">
                     </div>
                    </div>
                    <input onclick="addRow(this.form);" type="button" class="btn ink-reaction btn-raised" value="Add More">

                <div class="form-group"> <button name"submit" type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
                </div>
                        
                 </div>

            </div><!--end .card-body -->
        </div><!--end .card -->
       
    </div>
</div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="md md-person" style="font-size: 25px;line-height: 65px;"></i>
    </a>
    <ul>

        <li><a class="btn-floating yellow darken-1" href="{{route('adminModeratorManagement')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-visibility" style="line-height:40px;"></i></a></li>

        <li><a class="btn-floating blue" href="{{route('addCast')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-add" style="line-height:40px;"></i></a></li>

    </ul>
</div>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
    var rowNum = 0;
function addRow(frm) {
rowNum ++;
var row = '<label>Cast</label><select class="form-control" name="cast['+rowNum+']" data-style="btn-primary"><?php foreach($casts as $cast){?><option value="{{$cast->id}}"><?php echo $cast->username; ?></option>}<?php }?> </select> <label>Role</label> <input type="text" class="form-control" id="role['+rowNum+']"name="role['+rowNum+']"> </div> ';
jQuery('#itemRows').append(row);

}
</script>
@stop