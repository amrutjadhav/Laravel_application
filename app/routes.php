<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// installtion routes

Route::get('/install', array('as' => 'install', 'uses' => 'HomeController@install'));

Route::post('/install', array('as' => 'installSubmit', 'uses' => 'HomeController@install_submit'));

// feed collector

Route::get('/newsinshort/feed-collector', array('as' => 'feed', 'uses' => 'HomeController@feed_collector'));



Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('/search', array('as' => 'search', 'uses' => 'HomeController@showWelcome'));

Route::get('/cat/{cat}/{data}', array('as' => 'single', 'uses' => 'HomeController@single'));

Route::get('/category-type/{id}', array('as' => 'selectCat', 'uses' => 'HomeController@selectCat'));

Route::get('/login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::post('/ajaxloading', array('as' => 'ajaxloading', 'uses' => 'HomeController@ajax_loading'));

Route::post('/ajaxloading-category', array('as' => 'ajaxloadingcategory', 'uses' => 'HomeController@ajax_loading_category'));

Route::post('/login', array('as' => 'loginProcess', 'uses' => 'HomeController@processLogin'));

Route::get('/forgot-password', array('as' => 'forgotPassword', 'uses' => 'HomeController@forgot_password'));

Route::post('/forgot-password', array('as' => 'processForgotpassword', 'uses' => 'HomeController@processForgotpassword'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));

Route::post('/find-count', array('as' => 'viewCount', 'uses' => 'AdminController@viewCount'));

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function(){

	Route::get('/', array('as' => 'adminDashboard', 'uses' => 'AdminController@adminDashboard'));

	Route::get('/adminPost', array('as' => 'adminPost', 'uses' => 'AdminController@adminPost'));

	Route::get('/addPost', array('as' => 'adminAddPost', 'uses' => 'AdminController@addPost'));

	Route::post('/addPost', array('as' => 'adminAddPostProcess', 'uses' => 'AdminController@addPostProcess'));

	Route::get('/viewPost/{id}', array('as' => 'adminViewPost', 'uses' => 'AdminController@viewPost'));

	Route::get('/postActivate/{id}', array('as' => 'adminPostActivate', 'uses' => 'AdminController@approvePost'));

	Route::get('/postDecline/{id}', array('as' => 'adminPostDecline', 'uses' => 'AdminController@declinePost'));

	Route::get('/moderatorManagement', array('as' => 'adminModeratorManagement', 'uses' => 'AdminController@moderatorManagement'));

	Route::get('/addModerate', array('as' => 'addModerate', 'uses' => 'AdminController@addModerate'));

	Route::post('/addModerate', array('as' => 'addModerateProcess', 'uses' => 'AdminController@addModerateProcess'));

	Route::get('/moderatorActivate/{id}', array('as' => 'adminModeratorActivate', 'uses' => 'AdminController@moderatorActivate'));

	Route::get('/moderatorDecline/{id}', array('as' => 'adminModeratorDecline', 'uses' => 'AdminController@moderatorDecline'));

	Route::get('/moderatorEdit/{id}', array('as' => 'adminModeratorEdit', 'uses' => 'AdminController@editModerate'));

	Route::post('/moderatorEditProcess', array('as' => 'moderatorEditProcess', 'uses' => 'AdminController@moderatorEditProcess'));

	Route::get('/moderatorDelete/{id}', array('as' => 'adminModeratorDelete', 'uses' => 'AdminController@moderatorDelete'));

	Route::get('/setting', array('as' => 'adminSetting', 'uses' => 'AdminController@setting'));

	Route::post('/setting', array('as' => 'adminSettingProcess', 'uses' => 'AdminController@settingProcess'));

	Route::get('/adminProfile', array('as' => 'adminProfile', 'uses' => 'AdminController@adminProfile'));

	Route::post('/adminProfile', array('as' => 'adminProfileProcess', 'uses' => 'AdminController@adminProfileProcess'));

	Route::post('/profilePics', array('as' => 'adminProfilePics', 'uses' => 'AdminController@profilePics'));

	Route::post('/adminPassword', array('as' => 'adminPassword', 'uses' => 'AdminController@adminPassword'));

	Route::get('/category', array('as' => 'adminCategory', 'uses' => 'AdminController@category'));

	Route::post('/category', array('as' => 'catOrderType', 'uses' => 'AdminController@catOrderType'));

	Route::get('/addCategory', array('as' => 'addCategory', 'uses' => 'AdminController@addCategory'));

	Route::post('/addCategory', array('as' => 'addCategoryProcess', 'uses' => 'AdminController@addCategoryProcess'));

	Route::get('/editCategory/{id}', array('as' => 'editCategory', 'uses' => 'AdminController@editCategory'));

	Route::post('/editCategory/{id}', array('as' => 'editCategoryProcess', 'uses' => 'AdminController@editCategoryProcess'));

	Route::get('/deleteCategory/{id}', array('as' => 'deleteCategory', 'uses' => 'AdminController@deleteCategory'));

	Route::get('/getpublishedposts', array('as' => 'adminGetPublishedPosts', 'uses' => 'AdminController@getPublished'));

	Route::get('/getpendingposts', array('as' => 'adminGetPendingPosts', 'uses' => 'AdminController@getPending'));

	Route::get('/getflaggedposts', array('as' => 'adminGetFlaggedPosts', 'uses' => 'AdminController@getFlagged'));

	Route::get('/approvepost/{id}', array('as' => 'approvePost', 'uses' => 'AdminController@approvePost'));

	Route::get('/declinepost/{id}', array('as' => 'declinePost', 'uses' => 'AdminController@declinePost'));

	Route::get('/editPost/{id}', array('as' => 'adminEditPost', 'uses' => 'AdminController@editPost'));

	Route::post('/editPost/{id}', array('as' => 'adminEditProcess', 'uses' => 'AdminController@addPostProcess'));

	Route::post('/croppingImage', array(
		'as' => 'cropping-image',
		'uses' => 'ImageCropper@croppingImage'
	));

	Route::get('/deletePost/{id}', array('as' => 'adminDeletePost', 'uses' => 'AdminController@deletePost'));

	Route::get('/sendPush/{id}', array('as' => 'sendPush', 'uses' => 'AdminController@sendPush'));

	Route::get('/help', array('as' => 'help', 'uses' => 'AdminController@help'));

});

Route::group(array('prefix' => 'moderate', 'before' => 'moderate'), function(){

	Route::get('/', array('as' => 'moderateDashboard', 'uses' => 'ModerateController@moderateDashboard'));

	Route::get('/getallpost', array('as' => 'moderateGetAllPost', 'uses' => 'ModerateController@getAllPost'));

	Route::get('/getpublishedposts', array('as' => 'moderateGetPublishedPosts', 'uses' => 'ModerateController@getPublished'));

	Route::get('/getpendingposts', array('as' => 'moderateGetPendingPosts', 'uses' => 'ModerateController@getPending'));

	Route::get('/getflaggedposts', array('as' => 'moderateGetFlaggedPosts', 'uses' => 'ModerateController@getFlagged'));

	Route::get('/approvepost/{id}', array('as' => 'moderateApprovePost', 'uses' => 'ModerateController@approvePost'));

	Route::get('/declinepost/{id}', array('as' => 'moderateDeclinePost', 'uses' => 'ModerateController@declinePost'));

	Route::get('/editPost/{id}', array('as' => 'moderateEditPost', 'uses' => 'ModerateController@editPost'));

	Route::post('/editPost/{id}', array('as' => 'moderateEditPostProcess', 'uses' => 'ModerateController@addPostProcess'));

	Route::get('/deletePost/{id}', array('as' => 'moderateDeletePost', 'uses' => 'ModerateController@deletePost'));

	Route::get('/getprofile', array('as' => 'getProfile', 'uses' => 'ModerateController@getProfile'));

	Route::post('/updateProfile', array('as' => 'updateProfile', 'uses' => 'ModerateController@updateProfile'));

	Route::get('/moderateProfile', array('as' => 'moderateProfile', 'uses' => 'ModerateController@moderateProfile'));

	Route::post('/moderateProfile', array('as' => 'moderateProfileProcess', 'uses' => 'ModerateController@moderateProfileProcess'));

	Route::get('/addPost', array('as' => 'moderateAddPost', 'uses' => 'ModerateController@addPost'));

	Route::post('/addPost', array('as' => 'moderateAddPostProcess', 'uses' => 'ModerateController@addPostProcess'));

	Route::get('/post', array('as' => 'moderatePost', 'uses' => 'ModerateController@moderatePost'));

	Route::get('/viewPost/{id}', array('as' => 'moderateViewPost', 'uses' => 'ModerateController@viewPost'));

});

Route::get('/register', array('as' => 'register', 'uses' => 'ApiController@register'));

Route::get('/getCategory', array('as' => 'getCategory', 'uses' => 'ApiController@getCategory'));

Route::get('/postDetails', array('as' => 'postDetails', 'uses' => 'ApiController@postDetails'));

Route::get('/getPostCat', array('as' => 'getPostCat', 'uses' => 'ApiController@getPostCat'));

// Admin panel App's API

Route::get('/postlist', array('as' => 'postList', 'uses' => 'ApiController@postList'));

Route::get('/postDetail', array('as' => 'postDetail', 'uses' => 'ApiController@postDetail'));

Route::post('/ajax_now', array('as' => 'post_api_ajax', 'uses' => 'ApiController@api_ajax_loading'));

Route::post('/addPostProcess', array('as' => 'addApiPostProcess', 'uses' => 'ApiController@addApiPostProcess'));






