<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 10/7/15
 * Time: 12:03 AM
 */
?>
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
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/materialize.min.css')}}"  media="screen,projection"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/bootstrap.css?1422792965')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/materialadmin.css?1425466319')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/font-awesome.min.css?1422529194')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/theme-default/material-design-iconic-font.min.css?1421434286')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/style.css')}}" />
    <!-- END STYLESHEETS -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed">

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="#">
                            <span class="text-lg text-bold text-primary">{{Setting::get('sitename')}} DASHBOARD</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                        <a class="btn btn-warning" href="{{route('home')}}" target="_blank"> View Website</a>
                </li>
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                         @if(Auth::user()->profile_pic != "")
                            <img src="{{Auth::user()->profile_pic}}" alt="" />
                        @else
                            <img src="{{asset('admins/img/user.png')}}" alt="" />
                        @endif
                               <span class="profile-info">{{{Auth::user()->first_name}}}
                                    <smallpngministrator</small>
                                </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="{{route('adminProfile')}}">My profile</a></li>

                        <li class="divider"></li>

                        <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->

        </div><!--end #header-navbar-collapse -->
    </div>
</header>


<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">


    <!-- BEGIN CONTENT-->
    <div id="content">


        <!-- BEGIN BLANK SECTION -->
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">


                <li id="dashboard">
                    <a href="{{route('adminDashboard')}}" >
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="moderators">
                    <a href="{{route('adminModeratorManagement')}}" >
                        <div class="gui-icon"><i class="md md-person-outline"></i></div>
                        <span class="title">Moderators</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="category">
                    <a href="{{route('adminCategory')}}" >
                        <div class="gui-icon"><i class="md md-loyalty"></i></div>
                        <span class="title">Categories</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="posts">
                    <a href="{{route('adminPost')}}" >
                        <div class="gui-icon"><i class="md md-loyalty"></i></div>
                        <span class="title">Posts</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="admin_setting">
                    <a href="{{route('adminSetting')}}" >
                        <div class="gui-icon"><i class="md md-settings"></i></div>
                        <span class="title">Settings</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="account">
                    <a href="{{route('adminProfile')}}" >
                        <div class="gui-icon"><i class="md md-account-box"></i></div>
                        <span class="title">Account</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="help">
                    <a href="{{route('help')}}" >
                        <div class="gui-icon"><i class="md md-star"></i></div>
                        <span class="title">Need something?</span>
                    </a>
                </li><!--end /menu-li -->

            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Copyright &copy; 2015</span> <strong>{{Setting::get('footer')}}</strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

<!-- BEGIN OFFCANVAS RIGHT -->
<div id="content">

    <?php    
     $view = last_days(10);
    $device = device_count();
     ?>

    <!-- BEGIN BLANK SECTION -->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">

            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <h1 class="pull-right text-info"><i class="md md-photo"></i></h1>
                                <strong class="text-xl">{{{$post_count}}}</strong><br>
                                <span class="opacity-50">Total Posts</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-warning no-margin">
                                <h1 class="pull-right text-warning"><i class="md md-person"></i></h1>
                                <strong class="text-xl">{{{$moderate_count}}}</strong><br>
                                <span class="opacity-50">Total Users</span>
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div>

                <!-- BEGIN ALERT - TIME ON SITE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-success no-margin">
                                            <h1 class="pull-right text-success"><i class="md md-pageview"></i></h1>
                                            <strong class="text-xl">{{{total_view_count()}}}</strong><br/>
                                            <span class="opacity-50">Total No. of Views</span>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - TIME ON SITE -->

                <!-- BEGIN ALERT - VISITS -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-danger no-margin">
                                            <h1 class="pull-right text-danger"><i class="md md-av-timer"></i></h1>

                                            @if(compare_view_count() == 1)
                                            <strong class="pull-right text-success text-lg">0.58% <i class="md md-trending-up"></i></strong>
                                            @else
                                            <strong class="pull-right text-danger text-lg">0.03% <i class="md md-trending-down"></i></strong>
                                            @endif
                                            
                                            <strong class="text-xl">{{{average_view_count()}}}</strong><br/>
                                            <span class="opacity-50">Avg. Visits Per Day</span>
                                            <div class="stick-bottom-right">
                                                <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - VISITS -->


                             <!-- BEGIN NEW REGISTRATIONS -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Mobile Applications Count</header>
                                        
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-12">
                                            <div style="width:270px;height:270px;margin:0 auto;"> <canvas id="chart-area" width="250" height="250"/>  </canvas></div>
                                         <p style="padding-left:30px;padding-top:10px;"><strong>No. of Android Application Installed : </strong> {{{$device['android']}}}</p> 
                                         <p style="padding-left:30px"><strong>No. of IOS Application Installed : </strong> {{{$device['ios']}}}</p>   
                                        
                                                                        

                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END NEW REGISTRATIONS -->



                            <!-- BEGIN REGISTRATION HISTORY -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Last {{{$view['count']}}} Days Views Count Chart</header>
                                        
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-12" style="height:500px">
                                        <div class="stick-bottom-left-right force-padding">
                                            <div class="flot height-12">
                                                <canvas id="canvas" height="300" width="400"></canvas>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END REGISTRATION HISTORY -->

                            <!-- BEGIN NEW REGISTRATIONS -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Search View Count</header>
                                       
                                    </div>
                                    
                                    <div class="card-body no-padding height-4">
                                        <div class="alert alert-callout alert-info no-margin">
                                            <input type="date" name="date" id="getting_date" value=""><input type="button" id="submit_date" class="btn btn-info" value="Submit"></br>
                                            <strong id="text-1" class="text-xl"></strong><br/>
                                            <span id="text-2" class="opacity-50"></span>
                                        </div>  
                                          
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END NEW REGISTRATIONS -->

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Recent Posts</header>
                                       
                                    </div>
                                    
                                    <div class="card-body no-padding height-6 scroll">                                        

                                        <ul class="list divider-full-bleed">
                                            @foreach($posts as $post)
                                            <li class="tile">
                                                <div class="tile-content">
                                                    <div class="tile-icon">
                                                        <img src="{{{$post->image}}}" alt="" />
                                                    </div>
                                                    <div class="tile-text">{{{$post->title}}}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                          
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END NEW REGISTRATIONS -->


        </div><!--end .section-body -->
    </section>

    <!-- BEGIN BLANK SECTION -->
</div><!--end #content-->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="md md-star" style="font-size: 25px;line-height: 65px;"></i>
    </a>
    <ul>
        <li><a class="btn-floating green" href="{{route('adminModeratorManagement')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-person" style="line-height:40px;"></i></a></li>

        
        <li><a class="btn-floating blue" href="{{route('adminCategory')}}" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;"><i class="md md-loyalty" style="line-height:40px;"></i></a></li>

    </ul>
</div>


  <!-- BEGIN JAVASCRIPT -->

    <script src="{{asset('admins/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admins/js/materialize.min.js')}}"></script>
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
<script src="{{asset('admins/js/Chart.min.js')}}"></script>
<script src="{{asset('admins/js/core/demo/DemoFormWizard.js')}}"></script>
<script src="{{asset('admins/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<!-- END JAVASCRIPT -->
<script type="text/javascript">
    $("#<?= $page ?>").addClass("active");
</script>
<script>

    var barChartData = {
        labels : [<?php foreach($view['get'] as $date) { echo '"'.date('d M', strtotime($date->created_at)).'",';} ?>],
        datasets : [
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,0.8)",
                highlightFill : "rgba(151,187,205,0.75)",
                highlightStroke : "rgba(151,187,205,1)",
                data : [<?php foreach($view['get'] as $count) { echo $count->count.',';} ?>]
            }
        ]

    }

        var pieData = [
                {
                    value: <?php echo $device['android'] ?>,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Android Application"
                },
                {
                    value: <?php echo $device['ios'] ?>,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "IOS Application"
                }

            ];


    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        var ctxp = document.getElementById("chart-area").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true
        });
        window.myPie = new Chart(ctxp).Pie(pieData, {
            responsive : true
        });
    }

    </script>

    <script type="text/javascript">
    var submit_path = "{{route('viewCount')}}";
        $(document).ready(function(){
            $('#submit_date').click(function(){
            var date = $('#getting_date').val();
                
                        $.post(submit_path, {
                        date        : date
                            
                    }, function(data) {
                        console.log(data);
                        $('#text-1').show().html(data);
                        $('#text-2').show().html("Total No. of Views on "+ date);

                    });
                
            });
        });
    </script>

</body>
</html>
