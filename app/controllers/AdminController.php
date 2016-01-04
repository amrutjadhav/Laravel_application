<?php

class AdminController extends \BaseController {


	public function adminDashboard()
	{
		$moderate_count = User::where('role_id',1)->get()->count();
		$post_count = Post::all()->count();
		$posts = Post::orderBy('id','desc')->distinct()->where('is_approved',1)->take(5)->get();
		return View::make('admin.adminDashboard')->withPage('dashboard')
			->with('moderate_count',$moderate_count)
			->with('post_count',$post_count)
			->withPosts($posts);
	}

	public function moderatorManagement()
	{
		if($moderator = User::where('role_id',1)->paginate(10))
		{
			return View::make('admin.moderatorManagement')
				->with('title',"ModeratorManagement")
				->with('page',"moderators")
				->with('moderators',$moderator);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function addModerate()
	{
		return View::make('admin.addModerate')->withPage('moderators');
	}

	public function addModerateProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
			'author_name' => Input::get('author_name')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'author_name' => 'required'));
		$email = Input::get('email');
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else {
			$user = User::where('email', $email)->first();
			if ($user) {
				$error = "User already exists";
				return Redirect::back()->with('flash_error', $error);
			}
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->role_id = 1;
			$user->author_name = Input::get('author_name');

			$new_password = time();
			$new_password .= rand();
			$new_password = sha1($new_password);
			$new_password = substr($new_password, 0, 8);
			$user->password = Hash::make($new_password);


			$subject = "Welcome On Board";
			$email_data['name'] = $user->author_name;
			$email_data['password'] = $new_password;
			$email_data['email'] = $user->email;

			if ($user) {
				Mail::send('emails.newmoderator', array('email_data' => $email_data), function ($message) use ($email, $subject) {
					$message->to($email)->subject($subject);
				});
			}

			$user->save();

			if ($user) {
				return Redirect::back()->with('flash_success', tr('moderator_add'));
			} else {
				return Redirect::back()->with('flash_error', tr('went_wrong'));
			}
		}
	}

	public function moderatorActivate($id)
	{
		$moderator = User::find($id);
		$moderator->is_activated = 1;
		$moderator->save();
		if($moderator)
		{
			return Redirect::back()->with('flash_success',tr('moderator_activate'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function moderatorDecline($id)
	{
		$moderator = User::find($id);
		$moderator->is_activated = 0;
		$moderator->save();
		if($moderator)
		{
			return Redirect::back()->with('flash_success',tr('moderator_decline'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function editModerate($id)
	{
		$moderate = User::find($id);
		if($moderate)
		{
			return View::make('admin.editModerate')->withPage('moderators')->with('moderate',$moderate);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function moderatorEditProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
			'author_name' => Input::get('author_name')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'author_name' => 'required|unique:users,author_name'));
		$email = Input::get('email');
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else {

			$user = User::find(Input::get('id'));
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->author_name = Input::get('author_name');

			$user->save();
			if ($user) {
				return Redirect::back()->with('flash_success', tr('moderator_update'));
			} else {
				return Redirect::back()->with('flash_error', tr('went_wrong'));
			}
		}
	}

	public function moderatorDelete($id)
	{
		$moderate = User::find($id)->delete();
		if($moderate)
		{
			return Redirect::back()->with('flash_success',tr('moderator_delete'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function contributorsManagement()
	{
		if($contributors = User::where('role_id',3)->paginate(10))
		{
			return View::make('admin.contributorsManagement')
				->with('title',"ContributorsManagement")
				->with('page',"contributors")
				->with('contributors',$contributors);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function addContributors()
	{
		return View::make('admin.addContributors')->withPage('contributors');
	}

	public function addContributorsProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
			'author_name' => Input::get('author_name')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'author_name' => 'required|unique:users,author_name'));
		$email = Input::get('email');
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else {
			$user = User::where('email', $email)->first();
			if ($user) {
				$error = "User already exists";
				return Redirect::back()->with('flash_error', $error);
			}
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->author_name = Input::get('author_name');
			$user->role_id = 3;

			$new_password = time();
			$new_password .= rand();
			$new_password = sha1($new_password);
			$new_password = substr($new_password, 0, 8);
			$user->password = Hash::make($new_password);


			$subject = "Welcome On Board";
			$email_data['name'] = $user->author_name;
			$email_data['password'] = $new_password;
			$email_data['email'] = $user->email;

			if ($user) {
				Mail::send('emails.newmoderator', array('email_data' => $email_data), function ($message) use ($email, $subject) {
					$message->to($email)->subject($subject);
				});
			}

			$user->save();

			if ($user) {
				return Redirect::back()->with('flash_success', tr('contributor_add'));
			} else {
				return Redirect::back()->with('flash_error', tr('went_wrong'));
			}
		}
	}

	public function contributorsActivate($id)
	{
		$contributors = User::find($id);
		$contributors->is_activated = 1;
		$contributors->save();
		if($contributors)
		{
			return Redirect::back()->with('flash_success',tr('contributor_activate'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function contributorsDecline($id)
	{
		$contributors = User::find($id);
		$contributors->is_activated = 0;
		$contributors->save();
		if($contributors)
		{
			return Redirect::back()->with('flash_success',tr('contributor_decline'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function editContributors($id)
	{
		$contributors = User::find($id);
		if($contributors)
		{
			return View::make('admin.editContributors')->withPage('contributors')->with('contributors',$contributors);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function contributorsEditProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
			'author_name' => Input::get('author_name')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'author_name' => 'required|unique:users,author_name'));
		$email = Input::get('email');
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else {

			$user = User::find(Input::get('id'));
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->author_name = Input::get('author_name');

			$user->save();
			if ($user) {
				return Redirect::back()->with('flash_success', tr('contributor_update'));
			} else {
				return Redirect::back()->with('flash_error', tr('went_wrong'));
			}
		}
	}

	public function contributorsDelete($id)
	{
		$contributors = User::find($id)->delete();
		if($contributors)
		{
			return Redirect::back()->with('flash_success',tr('contributor_delete'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function catOrderType()
	{
		$ids = Input::get('id');
		$names = Input::get('name');
		$cate = Category::all();
		$na = 0;
		$i = 1;
		foreach ($names as $name)
		{
			if($na == $name)
			{
				return Redirect::back()->with('flash_error',tr('order_id_are_same'));
			}
			$na = $name;
		}
		foreach ($cate as $cat) 
		{
			$cates = Category::find($ids[$cat->id]);
			if($cates)
			{
				$cates->order_type = $names[$cat->id];
				$cates->save();
			}
		}
		return Redirect::back()->with('flash_success',tr('category_update'));
	}

	public function category()
	{
		$category = Category::paginate(10);
		return View::make('admin.category')->withPage('category')
			->with('categories',$category);
	}

	public function addCategory()
	{
		return View::make('admin.addcategory')->withPage('category');
	}

	public function addCategoryProcess()
	{
		$name = Input::get('name');
		$cat_img = Input::file('cat_img');
 		$validator = Validator::make(
			array(
				'name' => $name,
				'cat_img' => $cat_img,
			), array(
				'name' => 'required',
				'cat_img' => 'required|mimes:jpeg,bmp,gif,png',
			)
		);

		if ($validator->fails()) 
		{
			$error_messages = $validator->messages()->all();
			return Redirect::back()->with('flash_errors', $error_messages);
		} 
		else 
		{
			$category = new Category;
			$category->name = Input::get('name');
			$file_name = seo_url(Input::get('name')).'-'.time();
			$ext = Input::file('cat_img')->getClientOriginalExtension();
			Input::file('cat_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
			$local_url = $file_name . "." . $ext;
			$s3_url = URL::to('/') . '/uploads/' . $local_url;
			$category->pics = $s3_url;
			$category->save();
			if($category)
			{
				return Redirect::back()->with('flash_success',tr('category_add'));
			}
			else
			{
				return Redirect::back()->with('flash_error',tr('went_wrong'));
			}
		}
	}

	public function editCategory($id)
	{
		$categoryDetails = Category::find($id);
		if($categoryDetails)
		{
			return View::make('admin.editCategory')->withPage('category')->with('categoryDetails',$categoryDetails);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function editCategoryProcess($id)
	{
		$name = Input::get('name');
		$cat_img = Input::file('picture');
		$category = Category::find($id);
		if($category)
		{
			$category->name = $name;

	 		$validator = Validator::make(
				array(
					'picture' => $cat_img,
				), array(
					'picture' => 'required|mimes:jpeg,bmp,gif,png',
				)
			);

			if ($validator->fails()) 
			{
				//do nothing
			} 
			else 
			{
				$file_name = seo_url(Input::get('name')).'-'.time();
				$ext = Input::file('picture')->getClientOriginalExtension();
				Input::file('picture')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;
				$s3_url = URL::to('/') . '/uploads/' . $local_url;
				$category->pics = $s3_url;
			}

			$category->save();
			if($category)
			{
				return Redirect::back()->with('flash_success',tr('category_update'));
			}
			else
			{
				return Redirect::back()->with('flash_error',tr('went_wrong'));
			}
		}
	}

	public function deleteCategory($id)
	{
		$category = Category::where('id',$id)->delete();
		if($category)
		{
			return Redirect::back()->with('flash_success',tr('category_delete'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function adminPost()
	{
		$post = Post::orderBy('created_at', 'desc')->distinct()->paginate(20);
		return View::make('admin.post')
			->with('title',"Posts Management")
			->with('page', "posts")
			->with('posts',$post);
	}

		public function adminPendingPost()
	{
		$posts = Post::orderBy('created_at', 'desc')->where('is_approved',0)->distinct()->paginate(10);
		return View::make('admin.pending_post')
			->with('title',"Posts Management")
			->with('page', "post")
			->with('posts',$posts);
	}

	public function adminPostSearch()
	{
		$keyword = Input::get('keyword');
		$user = User::where('author_name','like', '%'.$keyword.'%')->first();
		if($user)
		{
			$post = Post::where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(10);
			if($post)
			{
				return View::make('admin.post')
					->with('title',"Posts Management")
					->with('page', "posts")
					->with('posts',$post);
			}
			else
			{
				return Redirect::route('adminPost')->with('flash_error',tr('not_found'));
			}
		}
		else
		{
			return Redirect::route('adminPost')->with('flash_error',tr('not_found'));
		}

	}

	public function addPost()
	{
		$category = Category::all();
		$details = get_user_details(Auth::user()->id);
		$publishers = Publisher::orderBy('name', 'ASC')->get();
		$publisher_test = Publisher::count();
		$authors = User::where('is_activated',1)->get();
		return View::make('admin.addPost')
			->with('title',"Posts Management")
			->with('page', "posts")
			->with('details',$details)
			->with('category',$category)
			->with('publishers',$publishers)
			->with('publisher_test',$publisher_test)
			->with('authors',$authors);
	}

	
	public function addPostProcess()
    {

        $category = Input::get('category');
        $title = Input::get('title');
        $post_img = Input::file('post_img');
        $url = Input::get('url');
        $title_tag = Input::get('title_tag');
        $meta_des = Input::get('meta_des');
		$share_link = Input::get('share_link');
		$share_cat = Input::get('share_cat');
		$author = Input::get('author');
		$publisher = Input::get('publisher');
		$pub_date = Input::get('pub_date');
		$pub_time = Input::get('pub_time');


		//dd(Input::get('push_button') == 'on');

 
        $validator = Validator::make(
            array(
                'title' => $title,
                'url' => $url,
                'meta_des' => $meta_des,
                'category' => $category,
				'author' => $author,
				'publisher' => $publisher

            ), array(
                'title' => 'required',
                'url' => 'required',
                'meta_des' => 'required',
                'category' => 'required',
				'author' => 'required',
				'publisher' => 'required'
            )
        );

        if ($validator->fails()) {
            $error_messages = $validator->messages()->all();
            return Redirect::back()->with('flash_errors', $error_messages);
        } 
        else 
        {
            if (Input::get('id') != "") 
            {
                $post = Post::find(Input::get('id'));
                $post->title = $title;
                $post->is_approved = 1;
                $post->des = Input::get('des');
                $post->url = $url;
                $post->author = $author;
                $post->meta_des = $meta_des;

                if(is_numeric($author)){
                	$post->user_id = $author;
            	}

                if($share_cat != "" && $share_link != ""){
                	$post->share_cat = $share_cat;
                	$post->share_title = $share_link;
                	$link = str_replace(" ", "-", Input::get('share_link')) . '-' . rand(0, 99);
                    $post->link = $link;
                }

				$post->publisher_id = $publisher;
				// $post->author = $author;
				if($pub_date != "")
				$post->created_at = date('Y-m-d H:i:s', strtotime("$pub_date $pub_time"));

                $validator1 = Validator::make(
                    array(
                        'post_img' => $post_img,
                    ), array(
                        'post_img' => 'required|mimes:jpeg,bmp,gif,png',
                    )
                );

                if ($validator1->fails()) 
                {
                    //do nothing
                } 
                else 
                {
                    $file_name = seo_url($title).'-'.time();
                    $post->des = Input::get('des');
                    $ext = Input::file('post_img')->getClientOriginalExtension();
                    Input::file('post_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
                    $local_url = $file_name . "." . $ext;

                    // Upload to S3
                    $s3_url = URL::to('/') . '/uploads/' . $local_url;

                    $post->image = $s3_url;
                }
                $post->category = implode(',', $category);
                $post->save();

                if (Input::get('push_button') == 'on') {

                    	Log::info('Push button Yes');
                    // checked
						$push_title = "PBN";
						$message = $title;
						$post_id = $post->id;
						$url = "single.html";

						Log::info($message);

                     	send_notifications($title,$message,$post_id,$url);
                    }
                    

				if ($post) {
					return Redirect::route('adminPost')->with('flash_success', tr('post_update'));
				} else {
					return Redirect::back()->with('flash_error', tr('went_wrong'));
				}
            } 
            else 
            {
                
                $validator1 = Validator::make(
                    array(
                        'title_tag' => $title_tag,
                        'post_img' => $post_img,
						'share_link' => $share_link,
						'share_cat' => $share_cat,
                    ), array(
                        'title_tag' => 'required',
						'share_link' => 'required',
						'share_cat' => 'required',
                        'post_img' => 'required|mimes:jpeg,bmp,gif,png',
                    )
                );

                if ($validator1->fails()) {
                    $error_messages = $validator->messages()->all();
                    return Redirect::back()->with('flash_errors', $error_messages);
                } 
                else
                {
	                $post = new Post;
	                $post->title = $title;
	                $post->is_approved = 1;
	                $post->url = $url;
	                $post->des = Input::get('des');
	                $post->meta_des = $meta_des;
					// $post->user_id = Auth::user()->id;
					$post->publisher_id = $publisher;
					$post->author = $author;


                    $file_name = seo_url($title).'-'.seo_url($share_cat).'-'.time();
                    $ext = Input::file('post_img')->getClientOriginalExtension();
                    Input::file('post_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
                    $local_url = $file_name . "." . $ext;

                    // Upload to S3
                    $s3_url = URL::to('/') . '/uploads/' . $local_url;

                    $post->image = $s3_url;

                    $post->category = implode(',', $category);

					$post->share_cat = $share_cat;

                	$post->share_title = Input::get('share_link');


                    $link = str_replace(" ", "-", Input::get('share_link')) . '-' . rand(0, 99);
                    
                    $post->link = $link;
                    $post->title_tag = $title_tag;
                    $post->save();

                    if (Input::get('push_button') == 'on') {

                    	Log::info('Push button Yes');
                    // checked
						$push_title = "PBN";
						$message = $title;
						$post_id = $post->id;
						$url = "single.html";

						Log::info($message);

                     	send_notifications($title,$message,$post_id,$url);
                    }
                }
				if ($post) {
					return Redirect::route('adminPost')->with('flash_success', tr('post_create'));
				} else {
					return Redirect::back()->with('flash_error', tr('went_wrong'));
				}
            }
        }
    }

	public function editPost($id)
    {
    	$check_con = 1;

        $category = Category::all();

        $post = Post::find($id);

        $check_role = get_user_details($post->user_id);

        if($check_role->role_id == 3 && $post->is_approved == 0){$check_con = 1;}

        $authors = User::where('is_activated',1)->get();

		$publishers = Publisher::orderBy('name', 'ASC')->get();

        $cate = explode(',', $post->category);

        return View::make('admin.editPost')
            ->with('title',"Posts Management")
            ->with('page', "posts")
            ->with('authors', $authors)
            ->with('contributor',$check_con)
            ->with('category',$category)
            ->with('post',$post)
            ->with('cate',$cate)
			->with('publishers',$publishers);
    }

    public function deletePost($id)
    {
        $post = Post::where('id',$id)->delete();
        if($post)
        {
            return Redirect::back()->with('flash_success',tr('post_delete'));
        }
        else
        {
            return Redirect::back()->with('flash_error',tr('went_wrong'));
        }
    }

	public function viewPost($id,$data)
	{
		$segment = $data;
		$cats = Category::orderBy('order_type')->get();
		$post_details = Post::where('link',$segment)->first();

		$related = Post::orderByRaw("RAND()")->where('is_approved',1)->take(2)->get();

		$publisher_name = "";
		$publisher_image = "";

		if($post_details)
		{
			if($publisher = Publisher::find($post_details->publisher_id)) 
			{
				$publisher_name = $publisher->name;
				$publisher_image = $publisher->image;
			} 

			counter($segment);
			return View::make('single-post')->with('publisher_image' , $publisher_image)->withRelated($related)->withPost($post_details)->with('cats',$cats);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

    public function sendPush($id)
    {
    	$post = Post::find($id);
    	if($post)
    	{
			$response_array = $post->title;
			$title = "PBN";
			$message = $post->title;
			$post_id = $post->id;
			$url = "single.html";

			Log::info($message);

            send_notifications($title,$message,$post_id,$url);
            
			Log::info("push started");
			return Redirect::back()->with('flash_success',tr('push_notification_success'));
    	}
    	else
    	{
    		return Redirect::back()->with('flash_error',tr('push_notification_error'));
    	}
    }

	public function setting()
	{
		return View::make('admin.setting')
			->with('title',"Flagged Posts")
			->with('page', "admin_setting");
	}

	public function settingProcess()
	{
		$validator = Validator::make(array(
			'sitename' => Input::get('sitename')),
			array('sitename' => 'required'));
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else
		{
			$validator1 = Validator::make(array(
				'picture' => Input::file('picture')),
				array('picture' => 'required|mimes:png'));
			if($validator1->fails())
			{
				// do nothing
			}
			else
			{
				$file_name = seo_url(Input::get('sitename')).'-'.time();
				$ext = Input::file('picture')->getClientOriginalExtension();
				Input::file('picture')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;
				$s3_url = URL::to('/') . '/uploads/' . $local_url;
				Setting::set('logo', $s3_url);
			}
			Setting::set('sitename', Input::get('sitename'));
			Setting::set('mandrill_username', Input::get('mandrill_username'));
			Setting::set('mandrill_secret', Input::get('mandrill_secret'));
			Setting::set('browser_key', Input::get('browser_key'));
			Setting::set('analytics_code', Input::get('analytics_code'));
			Setting::set('google_play', Input::get('google_play'));
			Setting::set('ios_app', Input::get('ios_app'));
			Setting::set('website_link', Input::get('website_link'));
			Setting::set('timezone', Input::get('timezone'));
			
			return Redirect::back()->with('flash_success', tr('success_done'));
		}
	}

	public function adminProfile()
	{
		$admin = Auth::user();
		return View::make('admin.profile')
			->with('title',"Flagged Posts")
			->with('page', "account")
			->with('admin',$admin);
	}

	public function adminProfileProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email'),
			'author_name' => Input::get('author_name')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'author_name' => 'required',
				'email' => 'required|email'));
		if($validator->fails())
		{
			$error = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error);
		}
		else {
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			$email = Input::get('email');
			$author_name = Input::get('author_name');
			$admin = User::find(Auth::user()->id);
			$admin->first_name = $first_name;
			$admin->last_name = $last_name;
			$admin->email = $email;
			$admin->author_name = $author_name;
			$admin->save();

			if ($admin) {
				return Redirect::back()->with('flash_success', tr('success_update'));
			} else {
				return Redirect::back()->with('flash_error', tr('went_wrong'));
			}
		}
	}

	public function adminPassword()
	{
		$validator = Validator::make(array(
			'password' => Input::get('password'),
			'con_password' => Input::get('con_password')),
			array('password' => 'required',
				'con_password' => 'required'));
		if($validator->fails())
		{
			$error = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error);
		}
		else
		{
			$password = Input::get('password');
            $con_password = Input::get('con_password');
            $admin = User::find(Auth::user()->id);
            $admin->password = Hash::make($con_password);
            $admin->save();

            if ($admin) {
                return Redirect::back()->with('flash_success', tr('success_update'));
            } else {
                return Redirect::back()->with('flash_error', tr('went_wrong'));
            }
		}
	}

	public function profilePics()
	{
		$validator = Validator::make(array(
			'profile_pic' => Input::file('profile_pic')),
			array('profile_pic' => 'required|mimes:jpeg,bmp,gif,png'));
		if($validator->fails())
		{
			$error = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error);
		}
		else
		{
			$admin = User::find(Auth::user()->id);
			$file_name = seo_url(Setting::get('sitename')).'-'.Auth::user()->author_name.'-'.time();
			$ext = Input::file('profile_pic')->getClientOriginalExtension();
			Input::file('profile_pic')->move(public_path() . "/uploads", $file_name . "." . $ext);
			$local_url = $file_name . "." . $ext;
			$s3_url = URL::to('/') . '/uploads/' . $local_url;
			$admin->profile_pic = $s3_url;
			$admin->save();

			if ($admin) {
                return Redirect::back()->with('flash_success', tr('post_update'));
            } else {
                return Redirect::back()->with('flash_error', tr('went_wrong'));
            }
		}
	}

	public function approvePost($id)
    {
        $post = Post::where('id',$id)->first();
        if($post)
        {
            $post->is_approved = 1;
            $post->save();
            return Redirect::back()->with('flash_success',tr('post_approve'));
        }
        else
        {
            return Redirect::back()->with('flash_error',tr('went_wrong'));
        }
    }

    public function declinePost($id)
    {
        $post = Post::where('id',$id)->first();
        if($post)
        {
            $post->is_approved = 0;
            $post->save();
            return Redirect::back()->with('flash_success',tr('post_decline'));
        }
        else
        {
            return Redirect::back()->with('flash_error',tr('went_wrong'));
        }
    }

    public function viewCount()
    {
    	$date = date("Y-m-d", strtotime(Input::get('date')));
    	
    	if($date != ""){
    		$count = get_view_by_date($date);
    	

	    	if($count){
	    		return $count;
	    	}else{
	    		return "0";
	    	}
	    }	
    }

	public function help()
	{
		return View::make('admin.help')->withPage('help');
	}

	public function viewPages()
	{
		$pages = Page::all();
		return View::make('admin.viewpages')->withPage('pagess')->with('pages',$pages);
	}

	public function pages()
	{
		$pages = Page::all();
		return View::make('admin.pages')->withPage('pagess')->withPages($pages);
	}

	public function editPage($id)
	{
		$page = Page::find($id);
		if($page)
		{
			return View::make('admin.editPage')->withPage('pagess')->with('pages',$page);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function pagesProcess()
	{
		$type = Input::get('type');
		$id = Input::get('id');
		$heading = Input::get('heading');
		$description = Input::get('description');

		$validator = Validator::make(array(
			'heading' => Input::get('heading'),
			'description' => Input::get('description')),
			array('heading' => 'required',
				'description' => 'required'));
		if($validator->fails())
		{
			$error = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error);
		}
		else
		{
			if(Input::has('id'))
			{
				$pages = Page::find($id);
				$pages->heading = $heading;
				$pages->description = $description;
				$pages->save();
			}
			else
			{
				$check_page = Page::where('type',$type)->first();
				if(!$check_page)
				{
					$pages = new Page;
					$pages->type = $type;
					$pages->heading = $heading;
					$pages->description = $description;
					$pages->save();
				}
				else
				{
					return Redirect::back()->with('flash_error',tr('page_already'));
				}
			}
			if($pages)
			{
				return Redirect::back()->with('flash_success',tr('page_add'));
			}
			else
			{
				return Redirect::back()->with('flash_error',tr('went_wrong'));
			}
		}
	}

	public function deletePage($id)
	{
		$page = Page::where('id',$id)->delete();
		if($page)
		{
			return Redirect::back()->with('flash_success',tr('page_delete'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function publisher()
	{
		$publisher = Publisher::paginate(10);
		return View::make('admin.publisher')->withPage('publisher')
			->with('publishers',$publisher);
	}

	public function addPublisher()
	{
		return View::make('admin.addpublisher')->withPage('publisher');
	}

	public function addPublisherProcess()
	{
		$name = Input::get('name');
		$cat_img = Input::file('cat_img');
		$validator = Validator::make(
			array(
				'name' => $name,
				'cat_img' => $cat_img,
			), array(
				'name' => 'required',
				'cat_img' => 'required|mimes:jpeg,bmp,gif,png',
			)
		);

		if ($validator->fails())
		{
			$error_messages = $validator->messages()->all();
			return Redirect::back()->with('flash_errors', $error_messages);
		}
		else
		{
			$publisher = new Publisher;
			$publisher->name = Input::get('name');
			$file_name = seo_url(Input::get('name')).'-'.time();
			$ext = Input::file('cat_img')->getClientOriginalExtension();
			Input::file('cat_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
			$local_url = $file_name . "." . $ext;
			$s3_url = URL::to('/') . '/uploads/' . $local_url;
			$publisher->image = $s3_url;
			$publisher->save();
			if($publisher)
			{
				return Redirect::back()->with('flash_success',tr('publisher_add'));
			}
			else
			{
				return Redirect::back()->with('flash_error',tr('went_wrong'));
			}
		}
	}

	public function editPublisher($id)
	{
		$publisherDetails = Publisher::find($id);
		if($publisherDetails)
		{
			return View::make('admin.editPublisher')->withPage('publisher')->with('publisherDetails',$publisherDetails);
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

	public function editPublisherProcess($id)
	{
		$name = Input::get('name');
		$cat_img = Input::file('picture');
		$publisher = Publisher::find($id);
		if($publisher)
		{
			$publisher->name = $name;

			$validator = Validator::make(
				array(
					'picture' => $cat_img,
				), array(
					'picture' => 'required|mimes:jpeg,bmp,gif,png',
				)
			);

			if ($validator->fails())
			{
				//do nothing
			}
			else
			{
				$file_name = seo_url(Input::get('name')).'-'.time();
				$ext = Input::file('picture')->getClientOriginalExtension();
				Input::file('picture')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;
				$s3_url = URL::to('/') . '/uploads/' . $local_url;
				$publisher->image = $s3_url;
			}

			$publisher->save();
			if($publisher)
			{
				return Redirect::back()->with('flash_success',tr('publisher_update'));
			}
			else
			{
				return Redirect::back()->with('flash_error',tr('went_wrong'));
			}
		}
	}

	public function deletePublisher($id)
	{
		$publisher = Publisher::where('id',$id)->delete();
		if($publisher)
		{
			return Redirect::back()->with('flash_success',tr('publisher_delete'));
		}
		else
		{
			return Redirect::back()->with('flash_error',tr('went_wrong'));
		}
	}

}