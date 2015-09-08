<?php

class AdminController extends \BaseController {


	public function adminDashboard()
	{
		$moderate_count = User::where('role_id',1)->get()->count();
		$post_count = Post::all()->count();
		return View::make('admin.adminDashboard')->withPage('dashboard')
			->with('moderate_count',$moderate_count)
			->with('post_count',$post_count);
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
			return Redirect::back()->with('flash_error',"Something went wrong");
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
			'email' => Input::get('email')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email'));
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

			$new_password = time();
			$new_password .= rand();
			$new_password = sha1($new_password);
			$new_password = substr($new_password, 0, 8);
			$user->password = Hash::make($new_password);


			$subject = "Welcome On Board";
			$email_data['name'] = $user->username;
			$email_data['password'] = $new_password;
			$email_data['email'] = $user->email;

			if ($user) {
				Mail::send('emails.newmoderator', array('email_data' => $email_data), function ($message) use ($email, $subject) {
					$message->to($email)->subject($subject);
				});
			}

			$user->save();

			if ($user) {
				return Redirect::back()->with('flash_success', "Moderate Added Successfully <br> please activate");
			} else {
				return Redirect::back()->with('flash_error', "Something went wrong");
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
			return Redirect::back()->with('flash_success',"User Activated successfully");
		}
		else
		{
			return Redirect::back()->with('flash_error',"Something went Wrong");
		}
	}

	public function moderatorDecline($id)
	{
		$moderator = User::find($id);
		$moderator->is_activated = 0;
		$moderator->save();
		if($moderator)
		{
			return Redirect::back()->with('flash_success',"User Declined successfully");
		}
		else
		{
			return Redirect::back()->with('flash_error',"Something went Wrong");
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
			return Redirect::back()->with('flash_error',"Something went wrong");
		}
	}

	public function moderatorEditProcess()
	{
		$validator = Validator::make(array(
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'email' => Input::get('email')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email'));
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

			$user->save();
			if ($user) {
				return Redirect::back()->with('flash_success', "Moderator updated successfully");
			} else {
				return Redirect::back()->with('flash_error', "Something went wrong");
			}
		}
	}

	public function moderatorDelete($id)
	{
		$moderate = User::find($id)->delete();
		if($moderate)
		{
			return Redirect::back()->with('flash_success',"User deleted successfully");
		}
		else
		{
			return Redirect::back()->with('flash_error',"Something went Wrong");
		}
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
		$category = new Category;
		$category->name = Input::get('name');
		$file_name = time();
		$file_name .= rand();
		$ext = Input::file('cat_img')->getClientOriginalExtension();
		Input::file('cat_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
		$local_url = $file_name . "." . $ext;
		$s3_url = URL::to('/') . '/uploads/' . $local_url;
		$category->pics = $s3_url;
		$category->save();
		if($category)
		{
			return Redirect::back()->with('flash_success',"Added successfully");
		}
		else
		{
			return Redirect::back()->with('flash_error',"Something went Wrong");
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
			return Redirect::back()->with('flash_error',"Something went Wrong");
		}
	}

	public function editCategoryProcess($id)
	{
		//dd(Input::all());
		$name = Input::get('name');
		$category = Category::find($id);
		if($category)
		{
			$category->name = $name;
				$file_name = time();
				$file_name .= rand();
				$ext = Input::file('picture')->getClientOriginalExtension();
				Input::file('picture')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;
				$s3_url = URL::to('/') . '/uploads/' . $local_url;
				$category->pics = $s3_url;
			$category->save();
		}
		if($category)
		{
			return Redirect::back()->with('flash_success',"Updated successfully");
		}
		else
		{
			return Redirect::back()->with('flash_error',"Something went Wrong");
		}
	}

	public function adminPost()
	{
		$post = Post::paginate(10);
		return View::make('admin.post')
			->with('title',"Posts Management")
			->with('page', "posts")
			->with('posts',$post);
	}

	public function addPost()
	{
		$category = Category::all();
		return View::make('admin.addPost')
			->with('title',"Posts Management")
			->with('page', "posts")
			->with('category',$category);
	}

	public function addPostProcess()
	{
		$title = Input::get('title');
		$post_img = Input::file('post_img');
		$url = Input::get('url');
		$category = Input::get('category');

		$validator = Validator::make(
			array(
				'title' => $title,
				'post_img' => $post_img,
				'url' => $url,
			), array(
				'title' => 'required',
				'url' => 'required',
				'post_img' => 'required|mimes:jpeg,bmp,gif,png'
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			return Redirect::back()->with('flash_errors', $error_messages);
		} else {
			if (Input::get('id') != "") {
				$post = Post::find(Input::get('id'));
				$post->title = $title;
				$post->is_approved = 1;
				$post->link = str_replace(" ", "-", Input::get('title')) . '-' . rand(0, 99);
				$post->url = $url;
				$file_name = time();
				$file_name .= rand();
				$post->des = Input::get('des');
				$ext = Input::file('post_img')->getClientOriginalExtension();
				Input::file('post_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;

				// Upload to S3
				$s3_url = URL::to('/') . '/uploads/' . $local_url;

				$post->image = $s3_url;
				$post->category = implode(',', $category);
				$post->save();
			} else {
				$post = new Post;
				$post->title = $title;
				$post->is_approved = 1;
				$post->url = $url;
				$post->des = Input::get('des');
				$post->link = str_replace(" ", "-", Input::get('title')) . '-' . rand(0, 99);
				$file_name = time();
				$file_name .= rand();
				$ext = Input::file('post_img')->getClientOriginalExtension();
				Input::file('post_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
				$local_url = $file_name . "." . $ext;

				// Upload to S3
				$s3_url = URL::to('/') . '/uploads/' . $local_url;

				$post->image = $s3_url;
				$post->category = implode(',', $category);
				$post->save();
			}

			if ($post) {
				return Redirect::back()->with('flash_success', "New Post added");
			} else {
				return Redirect::back()->with('flash_error', "Something went wrong");
			}
		}
	}

	public function editPost($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return View::make('admin.editPost')
            ->with('title',"Posts Management")
            ->with('page', "posts")
            ->with('category',$category)
            ->with('post',$post);
    }

    public function deletePost($id)
    {
        $post = Post::where('id',$id)->delete();
        if($post)
        {
            return Redirect::back()->with('flash_success',"Deleted successfully");
        }
        else
        {
            return Redirect::back()->with('flash_error',"Something went wrong");
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
			'sitename' => Input::get('sitename'),
			'footer' => Input::get('footer'),
			'picture' => Input::file('picture')),
			array('sitename' => 'required',
				'footer' => 'required',
				'picture' => 'required|mimes:png'));
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else
		{
			$file_name = time();
			$file_name .= rand();
			$ext = Input::file('picture')->getClientOriginalExtension();
			Input::file('picture')->move(public_path() . "/uploads", $file_name . "." . $ext);
			$local_url = $file_name . "." . $ext;
			$s3_url = URL::to('/') . '/uploads/' . $local_url;

			Setting::set('sitename', Input::get('sitename'));
			Setting::set('footer', Input::get('footer'));
			Setting::set('logo', $s3_url);
			return Redirect::back()->with('flash_success', "successfully");
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
			'password' => Input::get('password'),
			'con_password' => Input::get('con_password')),
			array('first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				'password' => 'required',
				'con_password' => 'required'));
		if($validator->fails())
		{
			$error = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error);
		}
		else {
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			$email = Input::get('email');
			$password = Input::get('password');
			$con_password = Input::get('con_password');
			$admin = User::find(Auth::user()->id);
			$admin->first_name = $first_name;
			$admin->last_name = $last_name;
			$admin->email = $email;
			$admin->password = Hash::make($con_password);
			$admin->save();

			if ($admin) {
				return Redirect::back()->with('flash_success', "Admin updated successfully");
			} else {
				return Redirect::back()->with('flash_error', "Something went wrong");
			}
		}
	}

}