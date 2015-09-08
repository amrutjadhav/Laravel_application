@extends('admin.adminLayout')

@section('content')

@include('notification.notify')
<!-- BEGIN OFFCANVAS RIGHT -->
<div id="content">

    <!-- BEGIN BLANK SECTION -->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Cast Details For Approval</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">

            <div class="row">
            @foreach($cast as $casting)
                <div class="col s12 m3">
                    <div class="card small" style="height: auto;">
                        <div class="card" style="margin-bottom:0">
                            <dl class="dl-horizontal">
                              <dt>First Name</dt>
                              <dd>{{{$casting->first_name}}}</dd>
                              <dt>Last Name</dt>
                              <dd>{{{$casting->last_name}}}</dd>
                                <dt>Gender</dt>
                              <dd>{{{$casting->gender}}}</dd>
                              <dt>Email</dt>
                              <dd>{{{$casting->email}}}</dd>
                              <dt>Date of Birth</dt>
                              <dd>{{{$casting->dob}}}</dd>
                              <dt>Description</dt>
                              <dd>{{{$casting->desb}}}</dd>
                            </dl>
                        </div>
                        <div class="card-action"  style="position:inherit">
                           To Accept the Cast Details  &nbsp; <a class="btn ink-reaction btn-floating-action btn-primary" href="{{route('approveCastProcess',array('id' => $casting->id))}}"><i class="fa fa-check"></i></a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div><!--end .section-body -->
    </section>

    <!-- BEGIN BLANK SECTION -->
</div><!--end #content-->

<div class="page">


</div>
@stop