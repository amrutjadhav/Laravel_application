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

// Route::get('/newsinshort/feed-collector', array('as' => 'feed', 'uses' => 'HomeController@feed_collector'));

Route::get('/testpush', array('as' => 'testpush', 'uses' => 'ApiController@testpush'));



Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('/search', array('as' => 'search', 'uses' => 'HomeController@showWelcome'));

Route::get('/read/{id}/{data}', array('as' => 'shareLink', 'uses' => 'HomeController@shareLink'));

Route::get('/category/{id}', array('as' => 'selectCat', 'uses' => 'HomeController@selectCat'));

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

	Route::get('/admin-pending-post', array('as' => 'adminPendingPost', 'uses' => 'AdminController@adminPendingPost'));

	Route::get('/postSearch', array('as' => 'adminPostSearch', 'uses' => 'AdminController@adminPostSearch'));

	Route::get('/addPost', array('as' => 'adminAddPost', 'uses' => 'AdminController@addPost'));

	Route::post('/addPost', array('as' => 'adminAddPostProcess', 'uses' => 'AdminController@addPostProcess'));

	Route::get('/viewPost/{id}/{data}', array('as' => 'adminViewPost', 'uses' => 'AdminController@viewPost'));

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

	Route::get('/contributorsManagement', array('as' => 'adminContributorsManagement', 'uses' => 'AdminController@contributorsManagement'));

	Route::get('/addcontributors', array('as' => 'addContributors', 'uses' => 'AdminController@addContributors'));

	Route::post('/addcontributors', array('as' => 'addContributorsProcess', 'uses' => 'AdminController@addContributorsProcess'));

	Route::get('/contributorsActivate/{id}', array('as' => 'adminContributorsActivate', 'uses' => 'AdminController@contributorsActivate'));

	Route::get('/contributorsDecline/{id}', array('as' => 'adminContributorsDecline', 'uses' => 'AdminController@contributorsDecline'));

	Route::get('/contributorsEdit/{id}', array('as' => 'adminContributorsEdit', 'uses' => 'AdminController@editContributors'));

	Route::post('/contributorsEditProcess', array('as' => 'contributorsEditProcess', 'uses' => 'AdminController@contributorsEditProcess'));

	Route::get('/contributorsDelete/{id}', array('as' => 'adminContributorsDelete', 'uses' => 'AdminController@contributorsDelete'));

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

	Route::get('/deletePost/{id}', array('as' => 'adminDeletePost', 'uses' => 'AdminController@deletePost'));

	Route::get('/sendPush/{id}', array('as' => 'sendPush', 'uses' => 'AdminController@sendPush'));

	Route::get('/help', array('as' => 'help', 'uses' => 'AdminController@help'));

	Route::get('/viewPage', array('as' => 'viewPages', 'uses' => 'AdminController@viewPages'));

	Route::get('/editPage/{id}', array('as' => 'editPage', 'uses' => 'AdminController@editPage'));

	Route::post('/editPage', array('as' => 'editPageProcess', 'uses' => 'AdminController@pagesProcess'));

	Route::get('/pages', array('as' => 'adminPages', 'uses' => 'AdminController@pages'));

	Route::post('/pages', array('as' => 'adminPagesProcess', 'uses' => 'AdminController@pagesProcess'));

	Route::get('/deletePage/{id}', array('as' => 'deletePage', 'uses' => 'AdminController@deletePage'));

	Route::get('/publisher', array('as' => 'publisher', 'uses' => 'AdminController@publisher'));

	Route::get('/addPublisher', array('as' => 'addPublisher', 'uses' => 'AdminController@addPublisher'));

	Route::post('/addPublisher', array('as' => 'addPublisherProcess', 'uses' => 'AdminController@addPublisherProcess'));

	Route::get('/editPublisher/{id}', array('as' => 'editPublisher', 'uses' => 'AdminController@editPublisher'));

	Route::post('/editPublisher/{id}', array('as' => 'editPublisherProcess', 'uses' => 'AdminController@editPublisherProcess'));

	Route::get('/deletePublisher/{id}', array('as' => 'deletePublisher', 'uses' => 'AdminController@deletePublisher'));

	Route::post('/mailConfig', array('as' => 'mailConfig', 'uses' => 'AdminController@mailConfig'));

	// PBN lite

	Route::get('/pbnlite', array('as' => 'pbnlite', 'uses' => 'AdminController@pbnlite'));

	Route::post('/pbnlite', array('as' => 'pbnliteProcess', 'uses' => 'AdminController@pbnliteProcess'));

	Route::get('/pbndate', array('as' => 'pbnDate', 'uses' => 'AdminController@pbnDate'));

	Route::get('/deletePbnlite/{id}', array('as' => 'adminDeletePbnLite', 'uses' => 'AdminController@adminDeletePbnLite'));


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

	Route::post('/profilePics', array('as' => 'moderateProfilePics', 'uses' => 'ModerateController@profilePics'));

	Route::post('/moderatePassword', array('as' => 'moderatePassword', 'uses' => 'ModerateController@moderatePassword'));

	Route::get('/addPost', array('as' => 'moderateAddPost', 'uses' => 'ModerateController@addPost'));

	Route::post('/addPost', array('as' => 'moderateAddPostProcess', 'uses' => 'ModerateController@addPostProcess'));

	Route::get('/post', array('as' => 'moderatePost', 'uses' => 'ModerateController@moderatePost'));

	Route::get('/viewPost/{id}/{data}', array('as' => 'moderateViewPost', 'uses' => 'ModerateController@viewPost'));

});

Route::group(array('prefix' => 'contributor', 'before' => 'contributor'), function(){

	Route::get('/', array('as' => 'contributorDashboard', 'uses' => 'ContributorController@contributorDashboard'));

	Route::get('/getallpost', array('as' => 'contributorGetAllPost', 'uses' => 'ContributorController@getAllPost'));

	Route::get('/getpublishedposts', array('as' => 'contributorGetPublishedPosts', 'uses' => 'ContributorController@getPublished'));

	Route::get('/getpendingposts', array('as' => 'contributorGetPendingPosts', 'uses' => 'ContributorController@getPending'));

	Route::get('/getflaggedposts', array('as' => 'contributorGetFlaggedPosts', 'uses' => 'ContributorController@getFlagged'));

	Route::get('/approvepost/{id}', array('as' => 'contributorApprovePost', 'uses' => 'ContributorController@approvePost'));

	Route::get('/declinepost/{id}', array('as' => 'contributorDeclinePost', 'uses' => 'ContributorController@declinePost'));

	Route::get('/editPost/{id}', array('as' => 'contributorEditPost', 'uses' => 'ContributorController@editPost'));

	Route::post('/editPost/{id}', array('as' => 'contributorEditPostProcess', 'uses' => 'ContributorController@addPostProcess'));

	Route::get('/deletePost/{id}', array('as' => 'contributorDeletePost', 'uses' => 'ContributorController@deletePost'));

	Route::get('/getprofile', array('as' => 'getProfile', 'uses' => 'ContributorController@getProfile'));

	Route::post('/updateProfile', array('as' => 'updateProfile', 'uses' => 'ContributorController@updateProfile'));

	Route::post('/contributorProfile', array('as' => 'contributorProfileProcess', 'uses' => 'ContributorController@contributorProfileProcess'));

	Route::post('/profilePics', array('as' => 'contributorProfilePics', 'uses' => 'ContributorController@profilePics'));

	Route::post('/contributorPassword', array('as' => 'contributorPassword', 'uses' => 'ContributorController@contributorPassword'));

	Route::get('/contributorProfile', array('as' => 'contributorProfile', 'uses' => 'ContributorController@contributorProfile'));

	Route::post('/contributorProfile', array('as' => 'contributorProfileProcess', 'uses' => 'ContributorController@contributorProfileProcess'));

	Route::get('/addPost', array('as' => 'contributorAddPost', 'uses' => 'ContributorController@addPost'));

	Route::post('/addPost', array('as' => 'contributorAddPostProcess', 'uses' => 'ContributorController@addPostProcess'));

	Route::get('/post', array('as' => 'contributorPost', 'uses' => 'ContributorController@contributorPost'));

	Route::get('/viewPost/{id}/{data}', array('as' => 'contributorViewPost', 'uses' => 'ContributorController@viewPost'));

});


Route::get('/register', array('as' => 'register', 'uses' => 'ApiController@register'));

Route::get('/getCategory', array('as' => 'getCategory', 'uses' => 'ApiController@getCategory'));

Route::get('/postDetails', array('as' => 'postDetails', 'uses' => 'ApiController@postDetails'));

Route::get('/getPostCat', array('as' => 'getPostCat', 'uses' => 'ApiController@getPostCat'));

Route::get('/singlePost' , array('as' => 'singlePost' , 'uses' => 'ApiController@singlePost'));
Route::get('/getNewPostCat', array('as' => 'getPostNewCat', 'uses' => 'ApiController@getNewPostCat'));
Route::get('/adddummypost', array('as' => 'adddummypost', 'uses' => 'AdminController@adddummypost'));
//PBN LITE

Route::get('/postpbnlite' , array('as' => 'postpbnlite' , 'uses' => 'ApiController@pbnlite')); 



// auto save for draft

Route::post('/auto-save-now', array('as' => 'auto_save_form', 'uses' => 'ApiController@auto_save_form'));

// phonegap api feed

Route::post('/api_hybrid_feed', array('as' => 'api_hybrid_feed', 'uses' => 'ApiController@api_hybrid_feed'));

// Admin panel App's API

Route::get('/postlist', array('as' => 'postList', 'uses' => 'ApiController@postList'));

Route::get('/postDetail', array('as' => 'postDetail', 'uses' => 'ApiController@postDetail'));

Route::post('/ajax_now', array('as' => 'post_api_ajax', 'uses' => 'ApiController@api_ajax_loading'));

Route::post('/addPostProcess', array('as' => 'addApiPostProcess', 'uses' => 'ApiController@addApiPostProcess'));

// point blank feed

Route::get('/rss', function(){

    // create new feed
    $feed = Feed::make();

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(60, 'laravelFeedKey');

    // check if there is cached feed and build new only if is not
    if (!$feed->isCached())
    {
       // creating rss feed with our most recent 20 posts
       $posts = DB::table('posts')->orderBy('created_at', 'desc')->where('is_approved',1)->take(20)->get();

       // set your feed's title, description, link, pubdate and language
       $feed->title = 'Point Blank News';
       $feed->description = 'Point Blank News is short news CMS.';
       $feed->logo = Setting::get('logo');
       $feed->link = URL::to('/');
       $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
       $feed->pubdate = $posts[0]->created_at;
       $feed->lang = 'en';
       $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

       foreach ($posts as $post)
       {
       	$feed->addArray([
			'title' => $post->title,
			'author' => '',
			'url' => route('shareLink',array('news', $post->link)),
			'link' => route('shareLink',array('news', $post->link)),
			'pubdate' => $post->created_at,
			'description' => $post->des,
			'post_image' => $post->image
			]);

       }

    }


    return $feed->render('rss',0);


});



