<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{Setting::get('sitename')}}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/bootstrap.css?1422792965')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/materialadmin.css?1425466319')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/font-awesome.min.css?1422529194')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('website_ui/css/animate.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/material-design-iconic-font.min.css?1421434286')}}" />
    <link rel="shortcut icon" type="image/png" href="{{Setting::get('logo')}}"/>
    
    
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed wp-bg">

@include('notification.notify')

<!-- BEGIN LOGIN SECTION -->
<section class="section-account">

<!--     <div class="img-backdrop" style="background-image: url('admins/img/signin-bg.jpg')"></div>
    <div class="spacer"></div> -->
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="log-box text-left">
                <img class="wp-logo" src="{{Setting::get('logo')}}">
                <div class="log-box-inner">
                    <form class="form floating-label" action="{{route('loginProcess')}}" accept-charset="utf-8" method="post">
                        <!-- <span class="text-lg text-bold text-primary">{{Setting::get('sitename')}} {{tr('login')}}</span>
                        <br/> -->

                        <div class="wp-form-group">
                            <span class="wp-label">{{tr('admin_email')}}</span>
                            <input type="email" class="wp-text-box" id="email" name="email">                           
                        </div>
                        <div class="wp-form-group">
                            <span class="wp-label">{{tr('password')}}</span>
                            <input type="password" class="wp-text-box" id="password" name="password">
                                              
                        </div>
                        
                        <div class="text-right">
                            <button class="btn btn-info btn-raised btn-wp-submit" type="submit">{{tr('login')}}</button>
                        </div>
                    </form>

                </div>
                <br>
                <p class="hepls-block"><a href="{{route('forgotPassword')}}">Lost your password?</a></p>
                <p class="hepls-block"><a href="{{URL::to('/')}}"><i class="fa fa-arrow-left"></i> Back to {{Setting::get('sitename')}}</a></p>


                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
<!-- END LOGIN SECTION -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{asset('admins/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('admins/js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('admins/js/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('admins/js/libs/spin.js/spin.min.js')}}"></script>
<script src="{{asset('admins/js/libs/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{asset('admins/js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('admins/js/core/source/App.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavigation.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppCard.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppForm.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavSearch.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppVendor.js')}}"></script>
<script src="{{asset('admins/js/core/demo/Demo.js')}}"></script>
<!-- END JAVASCRIPT -->

</body>
</html>
