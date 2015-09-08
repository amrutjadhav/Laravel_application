<!DOCTYPE html>
<html lang="en">
	<head>
    <title>{{Setting::get('sitename')}} - Dashboard</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/materialize.min.css')}}"  media="screen,projection"/>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/theme-default/bootstrap.css?1422792965')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/theme-default/materialadmin.css?1425466319')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/theme-default/font-awesome.min.css?1422529194')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/theme-default/material-design-iconic-font.min.css?1421434286')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/style.css')}}" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
	<body class="menubar-hoverable header-fixed ">
@include('notification.notify')
		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								
									<span class="text-lg text-bold text-primary">CUSTOMIZE</span>
								
							</div>
						</li>
						
					</ul>
				</div>
				
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					
					<div class="section-body contain-lg">

						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="text-primary">Website Configuration wizard</h1>
							</div><!--end .col -->
							<div class="col-lg-8">
								<article class="margin-bottom-xxl">
									<p class="lead">
										A form wizard let's you define how the data is grouped and sorted.
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<!-- BEGIN FORM WIZARD -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body ">
										<div id="rootwizard1" class="form-wizard form-wizard-horizontal">
											<form class="form floating-label" id="basic" method="POST" enctype="multipart/form-data" action="{{route('installSubmit')}}">
												<div class="form-wizard-nav">
													<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
													<ul class="nav nav-justified">
														<li class="active"><a href="#tab1" data-toggle="tab"><span class="title">DATABASE CONFIGURATION</span></a></li>
														<li><a href="#tab2" data-toggle="tab"><span class="title">ADMIN CONFIGURATION</span></a></li>
														<li><a href="#tab3" data-toggle="tab"><span class="title">WEBSITE CONFIGURATION</span></a></li>
													</ul>
												</div><!--end .form-wizard-nav -->
												<div class="tab-content clearfix">
													<div class="tab-pane active" id="tab1">
														<br/><br/>
														<div class="form-group">
															<input type="text" name="database_name" id="Address" class="form-control">
															<label for="Address" class="control-label">DATABASE NAME</label>
														</div>
														<div class="form-group">
															<input type="text" name="username" id="Address" class="form-control">
															<label for="Address" class="control-label">USERNAME</label>
														</div>
														<div class="form-group">
															<input type="text" name="password" id="Address" class="form-control">
															<label for="Address" class="control-label">PASSWORD</label>
														</div>
														
													</div><!--end #tab1 -->
													<div class="tab-pane" id="tab2">
														<br/><br/>
														<div class="form-group">
															<input type="text" name="admin_username" id="Address" class="form-control">
															<label for="Address" class="control-label">ADMIN EMAIL</label>
														</div>
														<div class="form-group">
															<input type="text" name="admin_password" id="Address" class="form-control">
															<label for="Address" class="control-label">ADMIN PASSWORD</label>
														</div>
													</div><!--end #tab2 -->
													<div class="tab-pane" id="tab3">
														<br/><br/>
														<div class="form-group">
									                        <input type="text" class="form-control" id="regular1" name="sitename" value="{{Setting::get('sitename')}}">
									                        <label for="regular1">Site Title</label>
									                    </div>

									                    <div class="form-group">
									                        <input type="text" class="form-control" id="regular1" name="footer" value="{{Setting::get('footer')}}">
									                        <label for="regular1">Footer</label>￼
									                    </div>

									                    <div class="file-field input-field col s12">
									                        <div class="btn light-blue accent-2" style="padding: 0px 10px;">
									                            <span>Choose Logo</span>
									                            <input type="file" name="picture" />
									                        </div>
									                        <input class="file-path validate" type="text"/>

									                    </div>
									                    <button type="submit" class="btn ink-reaction btn-raised btn-primary">Submit</button>
													</div><!--end #tab3 -->
												</div><!--end .tab-content -->
												<ul class="pager wizard">
													<li class="previous first"><a class="btn-raised" href="javascript:void(0);">First</a></li>
													<li class="previous"><a class="btn-raised" href="javascript:void(0);">Previous</a></li>
													<li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li>
													<li class="next"><a class="btn-raised" href="javascript:void(0);">Next</a></li>
												</ul>
											</form>
										</div><!--end #rootwizard -->
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END FORM WIZARD -->

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			

    <!-- BEGIN JAVASCRIPT -->
<script src="{{asset('admin/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/materialize.min.js')}}"></script>
<script src="{{asset('admin/js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('admin/js/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/libs/spin.js/spin.min.js')}}"></script>
<script src="{{asset('admin/js/libs/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{asset('admin/js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('admin/js/core/source/App.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppNavigation.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppCard.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppForm.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppNavSearch.js')}}"></script>
<script src="{{asset('admin/js/core/source/AppVendor.js')}}"></script>
<script src="{{asset('admin/js/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/js/core/demo/Demo.js')}}"></script>
        <script src="{{asset('admin/js/core/demo/DemoFormWizard.js')}}"></script>
    <script src="{{asset('admin/js/libs/jquery-validation/dist/additional-methods.min.js')}}"></script>
        <script src="{{asset('admin/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<!-- END JAVASCRIPT -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#basic").validate({
            rules: {
                database_name: "required",
                username: "required",
                password: "required",
                admin_username: "required",
                admin_password: "required"
            }
        });
    });
</script>
	</body>
</html>
