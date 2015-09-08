<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$post = Post::all();
		$cats = Category::all();
		return View::make('index')->with('posts',$post)->with('cats',$cats);
	}

	public function selectCat($id)
	{
		$cats = Category::all();
		$posts = "SELECT * from posts where category LIKE '%$id%'";
		$post = DB::select(DB::raw($posts));
		return View::make('category')->withPosts($post)->with('cats',$cats);

	}

	public function single($id)
	{
		$segment = $id;
		$cats = Category::all();
		$post_details = Post::where('link',$segment)->where('is_approved',1)->first();
		return View::make('single-post')->withPost($post_details)->with('cats',$cats);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('login');
	}

	public function login(){
		return View::make('login');
	}

	public function processLogin()
	{
		$validator = Validator::make(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')),
			array('email' => 'required',
				'password' => 'required'));
		$email = Input::get('email');
		$password = Input::get('password');
		if($validator->fails())
		{
			$errors = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$errors);
		}
		else
		{
			if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{
				$user = Auth::user();
				if($user->role_id == 2)
				{
					return Redirect::route('adminDashboard');
				}
				elseif($user->role_id == 1)
				{
					return Redirect::route('moderateDashboard');
				}
				else
				{
					return Redirect::route('login');
				}
			}
		}
	}

	public function processForgotpassword(){
		$email = Input::get('email');

		$validator = Validator::make(
			array(
				'email' => $email,
			), array(
				'email' => 'required|email',
			)
		);

		if ($validator->fails())
		{
			$error_messages = $validator->messages()->all();
			return Redirect::back()->with('flash_errors',$error_messages);
		}
		else
		{
			$user = User::where('email',$email)->first();

			$new_password = time();
			$new_password .= rand();
			$new_password = sha1($new_password);
			$new_password = substr($new_password, 0, 8);
			$user->password = Hash::make($new_password);

			$subject = "Your New Password";
			$email_data['name'] = $user->username;
			$email_data['password'] = $new_password;
			$email_data['email'] = $user->email;
			$user->save();

			if($user)
			{
				Mail::send('emails.newmoderator', array('email_data' => $email_data), function ($message) use ($email, $subject) {
					$message->to($email)->subject($subject);
				});
				return Redirect::back()->with('flash_success',"your password changed and new password is sent to your email!");
			}else{
				return Redirect::back()->with('flash_errors',"something went wrong!");
			}
		}
	}

	public function forgot_password()
	{
		return View::make('forgot_password');
	}

	public function search()
    {
        $user = Auth::user();
        $cat = Category::all();
        $segment = Input::get('q');
        $post_details =  DB::select(DB::raw("SELECT DISTINCT * FROM posts where title like '%$segment%' and is_approved = 1"));
        return View::make('index')->with('cats',$cat)->with('user',$user)->with('posts',$post_details);
    }

}
