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
		// i++ page count
		counter('home');
		return View::make('index')->with('posts',$post)->with('cats',$cats);
	}

	public function selectCat($id)
	{
		$cats = Category::all();
		$posts = "SELECT * from posts where category LIKE '%$id%'";
		$post = DB::select(DB::raw($posts));
		if($post)
		{
			return View::make('category')->withCategory_id($id)->with('cats',$cats);
		}
		else
		{
			return Redirect::route('home');
		}

	}

	public function single($id,$data)
	{
		$segment = $data;
		$cats = Category::all();
		$post_details = Post::where('link',$segment)->where('is_approved',1)->first();
		if($post_details)
		{	
			counter($segment);
			return View::make('single-post')->withPost($post_details)->with('cats',$cats);
		}
		else
		{
			return Redirect::route('home');
		}
		
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
					if($user->is_activated == 1)
					{
						return Redirect::route('moderateDashboard');
					}
					else
					{
						return Redirect::back()->with('flash_error',"Please activate your account, Check your mail or contact admin");
					}
				}
				else
				{
					return Redirect::back()->with('flash_error',"something went wrong");
				}
			}
			else
			{
				return Redirect::back()->with('flash_error',"Invalid Email and Password");
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

	public function ajax_loading()
	{
		$offset = is_numeric(Input::get('offset')) ? Input::get('offset') : die();
        $postnumbers = is_numeric(Input::get('number')) ? Input::get('number') : die();
        $q = Input::get('query');


        Log::info('num'. $q);
        Log::info('offset'. $offset);

        $query = "";

        if($q == ""){
        $query = Post::orderBy('id','desc')->distinct()->where('is_approved',1)->limit($postnumbers)->offset($offset)->get();
        }elseif($q != ""){
        $query = Post::orderBy('id','desc')->distinct()->where('is_approved',1)->where('title','like', '%'.$q.'%')->orWhere('des','like', '%'.$q.'%')->limit($postnumbers)->offset($offset)->get();
        }
        $data = $query;


        foreach ($data as $post) {
                $cat_id = explode(',', $post->category);
                $cat_data = Category::find($cat_id[0]);
                $cat_name = $cat_data->name;
                $fb = route("single",array("id" => $cat_name,"data" => $post->link));
                $twitter = route("single",array("id" => $cat_name,"data" => $post->link));
        	echo '<div class="col m6 s12 l4">
		          <div class="single-post card animated zoomIn">
		              <div class="card-image">
		                <a href="javascript:void(0);"><img src="'.$post->image.'"></a>
		                <span class="card-title"><a href="javascript:void(0);">'.$post->title.'</a><em class="time-ago right">'.$post->created_at->diffForHumans().'</em></span>
		              </div>
		              <div class="card-content">
		               <p class="text-justify">'.$post->des.'</p>
		              </div>

		              <div class="card-action text-center">

		                <a href="http://www.facebook.com/sharer.php?u='.$fb.'" class="full waves-effect waves-light btn light-blue darken-4"><i class="fa fa-facebook left"></i>Share on Facebook</a>
		                <a href="http://twitter.com/share?text='.$post->title.'&url='.$twitter.'" class="full waves-effect waves-light btn no-right-mar light-blue accent-3"><i class="fa fa-twitter left"></i>Share on Twitter</a>
		                <a href="'.$post->url.'" target="_blank" class="full-btn waves-effect waves-light btn no-right-mar mat-clr">Read More</a>

		              </div>
		             
		              
		          </div>  	
		      </div>';

        }
	}

	public function ajax_loading_category()
	{
		$offset = is_numeric(Input::get('offset')) ? Input::get('offset') : die();
        $postnumbers = is_numeric(Input::get('number')) ? Input::get('number') : die();
        $id = Input::get('category_id');

        Log::info('num'. $postnumbers);
        Log::info('offset'. $offset);

        $query = Post::orderBy('id','desc')->distinct()->where('is_approved',1)->where('category', 'LIKE', '%'.$id.'%')->limit($postnumbers)->offset($offset)->get();
        
        $data = $query;

        foreach ($data as $post) {
                $cat_id = explode(',', $post->category);
                $cat_data = Category::find($cat_id[0]);
                $cat_name = $cat_data->name;
                $fb = route("single",array("id" => $cat_name,"data" => $post->link));
                $twitter = route("single",array("id" => $cat_name,"data" => $post->link));
        	echo '<div class="col m6 s12 l4">
		          <div class="single-post card animated zoomIn">

		              <div class="card-image">
		                <a href="javascript:void(0);"><img src="'.$post->image.'"></a>
		                <span class="card-title"><a href="javascript:void(0);">'.$post->title.'</a><em class="time-ago right">'.$post->created_at->diffForHumans().'</em></span>
		              </div>
		              <div class="card-content">
		               <p class="text-justify">'.$post->des.'</p>
		              </div>

		              <div class="card-action text-center">

		                <a href="http://www.facebook.com/sharer.php?u='.$fb.'" class="full waves-effect waves-light btn light-blue darken-4"><i class="fa fa-facebook left"></i>Share on Facebook</a>
		                <a href="http://twitter.com/share?text='.$post->title.'&url='.$twitter.'" class="full waves-effect waves-light btn no-right-mar light-blue accent-3"><i class="fa fa-twitter left"></i>Share on Twitter</a>
		                <a href="'.$post->url.'" target="_blank" class="full-btn waves-effect waves-light btn no-right-mar mat-clr">View More</a>

		              </div>
		             
		              
		          </div>  	
		      </div>';

        }
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
