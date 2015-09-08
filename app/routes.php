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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('/search', array('as' => 'search', 'uses' => 'HomeController@search'));

Route::get('/post/{id}', array('as' => 'single', 'uses' => 'HomeController@single'));

Route::get('/selectCat/{id}', array('as' => 'selectCat', 'uses' => 'HomeController@selectCat'));

Route::get('/login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::post('/login', array('as' => 'loginProcess', 'uses' => 'HomeController@processLogin'));

Route::get('/forgot-password', array('as' => 'forgotPassword', 'uses' => 'HomeController@forgot_password'));

Route::post('/forgot-password', array('as' => 'processForgotpassword', 'uses' => 'HomeController@processForgotpassword'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function(){

	Route::get('/', array('as' => 'adminDashboard', 'uses' => 'AdminController@adminDashboard'));

	Route::get('/adminPost', array('as' => 'adminPost', 'uses' => 'AdminController@adminPost'));

	Route::get('/addPost', array('as' => 'adminAddPost', 'uses' => 'AdminController@addPost'));

	Route::post('/addPost', array('as' => 'adminAddPostProcess', 'uses' => 'AdminController@addPostProcess'));

	Route::get('/postActivate/{id}', array('as' => 'adminPostActivate', 'uses' => 'AdminController@postActivate'));

	Route::get('/postDecline/{id}', array('as' => 'adminPostDecline', 'uses' => 'AdminController@postDecline'));

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

	Route::get('/category', array('as' => 'adminCategory', 'uses' => 'AdminController@category'));

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

	Route::get('/deletePost/{id}', array('as' => 'adminDeletePost', 'uses' => 'AdminController@deletePost'));

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

	Route::get('/deletePost/{id}', array('as' => 'moderateDeletePost', 'uses' => 'ModerateController@deletePost'));

	Route::get('/getprofile', array('as' => 'getProfile', 'uses' => 'ModerateController@getProfile'));

	Route::post('/updateProfile', array('as' => 'updateProfile', 'uses' => 'ModerateController@updateProfile'));

	Route::get('/moderateProfile', array('as' => 'moderateProfile', 'uses' => 'ModerateController@moderateProfile'));

	Route::post('/moderateProfile', array('as' => 'moderateProfileProcess', 'uses' => 'ModerateController@moderateProfileProcess'));

	Route::get('/addPost', array('as' => 'moderateAddPost', 'uses' => 'ModerateController@addPost'));

	Route::post('/addPost', array('as' => 'moderateAddPostProcess', 'uses' => 'ModerateController@addPostProcess'));

	Route::get('/post', array('as' => 'moderatePost', 'uses' => 'ModerateController@moderatePost'));

});