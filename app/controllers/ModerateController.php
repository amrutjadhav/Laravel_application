<?php

class ModerateController extends \BaseController {

    public function moderateDashboard()
    {
        $post_count = Post::all()->count();
        return View::make('moderate.moderateDashboard')->withPage('dashboard')
            ->with('post_count',$post_count);
    }

    public function moderatePost()
    {
        $post = Post::paginate(10);
        return View::make('moderate.post')
            ->with('title',"Posts Management")
            ->with('page', "posts")
            ->with('posts',$post);
    }

    public function addPost()
    {
        $category = Category::all();
        return View::make('moderate.addPost')
            ->with('title',"Posts Management")
            ->with('page', "posts")
            ->with('category',$category);
    }

    public function editPost($id)
    {
        $category = Category::all();
        $post = Post::find($id);
        return View::make('moderate.editPost')
            ->with('title',"Posts Management")
            ->with('page', "posts")
            ->with('category',$category)
            ->with('post',$post);
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
                $base64 = base64_encode(date('h-i-s'));
                $base64url = strtr($base64, '+/', '-_');
                $post->link = $base64url;
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

    public function moderateProfile()
    {
        $admin = Auth::user();
        return View::make('moderate.profile')
            ->with('title',"Flagged Posts")
            ->with('page', "account")
            ->with('admin',$admin);
    }

    public function moderateProfileProcess()
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