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
    <link type="text/css" rel="stylesheet" href="{{asset('admins/css/date.css')}}" />
    <link rel="shortcut icon" type="image/png" href="{{Setting::get('logo')}}"/>
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
                        <a href="javascript:void(0);">
                            <span class="text-lg text-bold text-primary">{{Setting::get('sitename')}} {{ tr('dashboard') }}</span>
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
                        <a class="btn btn-warning" href="{{route('home')}}" target="_blank"> 
                            {{ tr('view_website')}}
                        </a>
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
									<small>{{ tr('admin') }}</small>
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">
                            {{ tr('settings')}}
                        </li>
                        <li><a href="{{route('adminProfile')}}">
                               {{ tr('admin_my_profile')}}
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i>{{ tr('admin_logout') }}</a></li>
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
                        <span class="title">{{ tr('dashboard') }}</span>
                    </a>
                </li><!--end /menu-li -->


                <li class="gui-folder" id="contributors">
                    <a>
                        <div class="gui-icon"><i class="md md-person-outline"></i></div>
                        <span class="title">{{ tr('contributors') }}</span>

                    </a>
                    <!--start submenu -->
                    <ul style="display: none;">
                        <li><a href="{{route('adminContributorsManagement')}}"><span class="title">{{ tr('view_contributors')}}</span></a></li>

                        <li><a href="{{route('addContributors')}}">
                                <span class="title">
                                    {{ tr('add_contributors')}}
                                </span>
                            </a>
                        </li>

                    </ul><!--end /submenu -->
                </li>

                <li class="gui-folder" id="moderators">
                    <a>
                        <div class="gui-icon"><i class="md md-person-outline"></i></div>
                        <span class="title">{{ tr('moderators')}}</span>

                    </a>
                    <!--start submenu -->
                    <ul style="display: none;">
                        <li><a href="{{route('adminModeratorManagement')}}">
                                <span class="title">{{ tr('view_moderators') }}</span>
                            </a>
                        </li>

                        <li><a href="{{route('addModerate')}}"><span class="title">
                            {{ tr('add_moderators') }}
                            </span></a></li>

                    </ul><!--end /submenu -->
                </li>

                <li id="category">
                    <a href="{{route('adminCategory')}}" >
                        <div class="gui-icon"><i class="md md-loyalty"></i></div>
                        <span class="title">{{ tr('categories')}}</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="publisher">
                    <a href="{{route('publisher')}}" >
                        <div class="gui-icon"><i class="md md-loyalty"></i></div>
                        <span class="title">{{ tr('publisher')}}</span>
                    </a>
                </li><!--end /menu-li -->

                <li class="gui-folder" id="posts">
                    <a>
                        <div class="gui-icon"><i class="fa fa-newspaper-o"></i></div>
                        <span class="title">{{ tr('posts')}}</span>

                    </a>
                    <!--start submenu -->
                    <ul style="display: none;">
                        <li><a href="{{route('adminPost')}}"><span class="title">
                        {{ tr('view_posts') }}
                        </span></a></li>

                        <li>
                            <a href="{{route('adminPendingPost')}}">
                                <span class="title">
                                    {{ tr('pending_post') }}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('adminAddPost')}}">
                                <span class="title">
                                    {{ tr('add_post') }}
                                </span>
                            </a>
                        </li>

                    </ul><!--end /submenu -->
                </li>

                 <li id="pbnlite">
                    <a href="{{route('pbnlite')}}" >
                        <div class="gui-icon"><i class="md md-star"></i></div>
                        <span class="title">{{ tr('pbn_lite')}}</span>
                    </a>
                </li><!--end /menu-li -->


                <li id="admin_setting">
                    <a href="{{route('adminSetting')}}" >
                        <div class="gui-icon"><i class="md md-settings"></i></div>
                        <span class="title">{{ tr('settings')}}</span>
                    </a>
                </li><!--end /menu-li -->


                <li id="account">
                    <a href="{{route('adminProfile')}}" >
                        <div class="gui-icon"><i class="md md-account-box"></i></div>
                        <span class="title">{{ tr('account')}}</span>
                    </a>
                </li><!--end /menu-li -->

                <li id="help">
                    <a href="{{route('help')}}" >
                        <div class="gui-icon"><i class="md md-star"></i></div>
                        <span class="title">{{ tr('need_something')}}</span>
                    </a>
                </li><!--end /menu-li -->

            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <strong>{{Setting::get('footer')}}</strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

    @yield('content')

    <!-- BEGIN JAVASCRIPT -->

<script src="{{asset('admins/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('admins/js/materialize.min.js')}}"></script>
<script src="{{asset('admins/js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('admins/js/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('admins/js/libs/spin.js/spin.min.js')}}"></script>
<script src="{{asset('admins/js/libs/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{asset('admins/js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('admins/js/core/source/App.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavigation.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppCard.js')}}"></script>
<script src="{{asset('admins/js/libs/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppForm.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppNavSearch.js')}}"></script>
<script src="{{asset('admins/js/core/source/AppVendor.js')}}"></script>
<script src="{{asset('admins/js/date.js')}}"></script>
<script src="{{asset('admins/js/core/demo/Demo.js')}}"></script>
<script src="{{asset('admins/js/core/demo/DemoFormWizard.js')}}"></script>
<script src="{{asset('admins/js/core/demo/DemoFormComponents.js')}}"></script>
<script src="{{asset('admins/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>

<!-- END JAVASCRIPT -->
<script type="text/javascript">
    $("#<?= $page ?>").addClass("active");
</script>


    <script type="text/javascript">
    $('#demo-date').datepicker({autoclose: true, todayHighlight: true});
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



</body>
</html>
