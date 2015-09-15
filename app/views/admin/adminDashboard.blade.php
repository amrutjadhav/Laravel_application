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
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="{{asset('admins/img/user.png')}}" alt="" />
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
                                <h1 class="pull-right text-success"><i class="md md-photo"></i></h1>
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
                                <h1 class="pull-right text-success"><i class="md md-person"></i></h1>
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
                                            <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
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
                                        <div class="alert alert-callout alert-warning no-margin">
                                            @if(compare_view_count() == 1)
                                            <strong class="pull-right text-success text-lg">0,38% <i class="md md-trending-up"></i></strong>
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


                            <!-- BEGIN REGISTRATION HISTORY -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Registration history</header>
                                        <div class="tools">
                                            <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                            <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                        </div>
                                    </div><!--end .card-head -->
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="col-sm-6 hidden-xs">
                                                <div class="force-padding text-sm text-default-light">
                                                    <p>
                                                        <i class="md md-mode-comment text-primary-light"></i>
                                                        The registrations are measured from the time that the redesign was fully implemented and after the first e-mailing.
                                                    </p>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-sm-6">
                                                <div class="force-padding pull-right text-default-light">
                                                    <h2 class="no-margin text-primary-dark"><span class="text-xxl">66.05%</span></h2>
                                                    <i class="fa fa-caret-up text-success fa-fw"></i> more registrations
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="stick-bottom-left-right force-padding">
                                            <div id="flot-registrations" class="flot height-5" data-title="Registration history" data-color="#0aa89e"></div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END REGISTRATION HISTORY -->

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
<script src="{{asset('admins/js/libs/d3/d3.min.js')}}"></script>
<script src="{{asset('admins/js/libs/d3/d3.v3.js')}}"></script>
<script src="{{asset('admins/js/core/source/App.js')}}"></script>
<script src="{{asset('admins/js/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('admins/js/libs/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavigation.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppCard.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppForm.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavSearch.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppVendor.js')}}"></script>
<script src="{{asset('admins/js/core/demo/Demo.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/jquery.flot.min.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/jquery.flot.orderBars.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('admins/js/libs/flot/curvedLines.js')}}"></script>
        <script src="{{asset('admins/js/libs/moment/moment.min.js')}}"></script>


        <script src="{{asset('admins/js/core/demo/DemoFormWizard.js')}}"></script>
        <script src="{{asset('admins/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<!-- END JAVASCRIPT -->
<script type="text/javascript">
    $("#<?= $page ?>").addClass("active");
</script>

<script type="text/javascript">
    (function (namespace, $) {
    "use strict";

    var DemoDashboard = function () {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = DemoDashboard.prototype;


    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function () {
        this._initFlotRegistration();
    };

    
    // =========================================================================
    // FLOT
    // =========================================================================

    p._initFlotRegistration = function () {
        var o = this;
        var chart = $("#flot-registrations");
        
        // Elements check
        if (!$.isFunction($.fn.plot) || chart.length === 0) {
            return;
        }
        
        // Chart data
        var data = [
            {
                label: 'Registrations',
                data: [
                    [moment().subtract(11, 'month').valueOf(), 1100],
                    [moment().subtract(10, 'month').valueOf(), 2450],
                    [moment().subtract(9, 'month').valueOf(), 3800],
                    [moment().subtract(8, 'month').valueOf(), 2650],
                    [moment().subtract(7, 'month').valueOf(), 3905],
                    [moment().subtract(6, 'month').valueOf(), 5250],
                    [moment().subtract(5, 'month').valueOf(), 3600],
                    [moment().subtract(4, 'month').valueOf(), 4900],
                    [moment().subtract(3, 'month').valueOf(), 6200],
                    [moment().subtract(2, 'month').valueOf(), 5195],
                    [moment().subtract(1, 'month').valueOf(), 6500],
                    [moment().valueOf(), 7805]
                ],
                last: true
            }
        ];

        // Chart options
        var labelColor = chart.css('color');
        var options = {
            colors: chart.data('color').split(','),
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true,
                    radius: 3,
                    lineWidth: 2
                }
            },
            legend: {
                show: false
            },
            xaxis: {
                mode: "time",
                timeformat: "%b %y",
                color: 'rgba(0, 0, 0, 0)',
                font: {color: labelColor}
            },
            yaxis: {
                font: {color: labelColor}
            },
            grid: {
                borderWidth: 0,
                color: labelColor,
                hoverable: true
            }
        };
        chart.width('100%');
        
        // Create chart
        var plot = $.plot(chart, data, options);

        // Hover function
        var tip, previousPoint = null;
        chart.bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];
                    var tipLabel = '<strong>' + $(this).data('title') + '</strong>';
                    var tipContent = y + " " + item.series.label.toLowerCase() + " on " + moment(x).format('dddd');

                    if (tip !== undefined) {
                        $(tip).popover('destroy');
                    }
                    tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
                    tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
                }
            }
            else {
                if (tip !== undefined) {
                    $(tip).popover('destroy');
                }
                previousPoint = null;
            }
        });
    };

    // =========================================================================
    namespace.DemoDashboard = new DemoDashboard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

</script>

</body>
</html>
