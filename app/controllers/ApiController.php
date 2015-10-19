<?php

class ApiController extends \BaseController
{

	public function getCategory()
	{
		$category = Category::orderBy('order_type')->get();
		if ($category) {
			$response_array = array('success' => true, 'category' => $category);
		} else {
			$response_array = array('success' => false, 'error_msg' => "no data");
		}
		return Response::json($response_array);
	}

	public function postDetails()
	{
		$posts = Post::where('is_approved', 1)->get();
		$datas = array();
		foreach ($posts as $post) {
			$cat_id = explode(',', $post->category);
			$cat_data = Category::find($cat_id[0]);
			$cat_name = $cat_data->name;
			$link = URL::to('/') . '/cat/' . $cat_name . '/' . $post->link;
			$data = array();
			$data['title'] = $post->title;
			$data['description'] = $post->des;
			$data['url'] = $post->url;
			$data['image'] = $post->image;
			$data['share_link'] = $link;
			array_push($datas, $data);
		}
		$response_array = array('success' => true, 'posts' => $datas);

		return Response::json($response_array);
	}

	public function getPostCat()
	{
		$cat = Input::get('category');
		$take = Input::get('take');
		$skip = Input::get('skip');

		$validator = Validator::make(
			array(
				'take' => $take,
				'skip' => $skip,
			), array(
				'take' => 'required|integer',
				'skip' => 'required|integer',
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		} else {
			if (!$cat) {
				$posts = Post::where('is_approved', 1)->take($take)->skip($skip)->orderBy('created_at', 'desc')->get();
				$counts = Post::where('is_approved', 1)->count();
				$datas = array();
				foreach ($posts as $post) {
					$cat_id = explode(',', $post->category);
					$cat_data = Category::find($cat_id[0]);
					$cat_name = $cat_data->name;
					$link = URL::to('/') . '/cat/' . $cat_name . '/' . $post->link;
					$data = array();
					$data['id'] = $post->id;
					$data['title'] = $post->title;
					$data['description'] = $post->des;
					$data['url'] = $post->url;
					$data['image'] = $post->image;
					$data['time'] = $post->created_at->diffForHumans();
					$data['share_link'] = $link;
					array_push($datas, $data);
				}
				$response_array = array('success' => true, 'posts' => $datas, 'counts' => $counts);
			} else {
				$postss = Post::where('is_approved', 1)->where('category', 'like', '%' . $cat . '%')->take($take)->skip($skip)->orderBy('created_at', 'desc')->get();
				$counts = Post::where('is_approved', 1)->where('category', 'like', '%' . $cat . '%')->count();
				$datas = array();
				foreach ($postss as $post) {
					$cat_id = explode(',', $post->category);
					$cat_data = Category::find($cat_id[0]);
					$cat_name = $cat_data->name;
					$link = URL::to('/') . '/cat/' . $cat_name . '/' . $post->link;
					$data = array();
					$data['id'] = $post->id;
					$data['title'] = $post->title;
					$data['description'] = $post->des;
					$data['url'] = $post->url;
					$data['image'] = $post->image;
					$data['time'] = $post->created_at->diffForHumans();
					$data['share_link'] = $link;

					array_push($datas, $data);
				}
				$response_array = array('success' => true, 'posts' => $datas, 'counts' => $counts);
			}
		}
		return Response::json($response_array);
	}

	public function register()
	{
		$device_token = Input::get('device_token');
		$device_type = Input::get('device_type');

		$validator = Validator::make(
			array(
				'device_token' => $device_token,
				'device_type' => $device_type,
			), array(
				'device_token' => 'required',
				'device_type' => 'required',
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		} else {
			$finding_device = MobileRegister::whereDevice_token($device_token)->count();
			if ($finding_device == 0) {
				$add_device = new MobileRegister;
				$add_device->device_type = $device_type;
				$add_device->device_token = $device_token;
				$add_device->save();

				$response_array = array('success' => true, 'message' => "Device Register Successfully");
			} else {
				$response_array = array('success' => false, 'message' => "Device Already Registered");
			}

		}

		return Response::json($response_array);

	}

	public function postList()
	{
		$take = Input::get('take');
		$skip = Input::get('skip');

		$validator = Validator::make(
			array(
				'take' => $take,
				'skip' => $skip,
			), array(
				'take' => 'required',
				'skip' => 'required',
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		} else {
			$posts = Post::take($take)->skip($skip)->orderBy('created_at', 'desc')->get();
			$counts = Post::count();
			$datas = array();
			foreach ($posts as $post) {
				$data = array();
				$data['id'] = $post->id;
				$data['title'] = $post->title;
				$data['description'] = $post->des;
				$data['url'] = $post->url;
				$data['image'] = $post->image;
				$data['time'] = $post->created_at;
				$data['share_link'] = $post->link;
				$data['category'] = $post->category;
				$data['is_approved'] = $post->is_approved;
				$data['title_tag'] = $post->title_tag;
				$data['meta_desc'] = $post->meta_des;
				array_push($datas, $data);
			}
			$response_array = array('success' => true, 'posts' => $datas, 'counts' => $counts);
		}
		return Response::json($response_array);
	}

	public function postDetail()
	{
		$id = Input::get('id');

		$validator = Validator::make(
			array(
				'id' => $id,
			), array(
				'id' => 'required',
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		} else {
			$post = Post::find($id);
			if ($post) {
				$data = array();
				$data['id'] = $post->id;
				$data['title'] = $post->title;
				$data['description'] = $post->des;
				$data['url'] = $post->url;
				$data['image'] = $post->image;
				$data['time'] = $post->created_at;
				$data['share_link'] = $post->link;
				$data['category'] = $post->category;
				$data['is_approved'] = $post->is_approved;
				$data['title_tag'] = $post->title_tag;
				$data['meta_desc'] = $post->meta_des;

			}
			$response_array = array('success' => true, 'posts' => $data);
		}
		return Response::json($response_array);
	}

	public function addApiPostProcess()
	{
		$category = Input::get('category');
		$title = Input::get('title');
		$post_img = Input::file('post_img');
		$url = Input::get('url');
		$title_tag = Input::get('title_tag');
		$meta_des = Input::get('meta_des');

		$validator = Validator::make(
			array(
				'title' => $title,
				'url' => $url,
				'meta_des' => $meta_des,
				'category' => $category,
				'post_img' => $post_img
			), array(
				'title' => 'required',
				'url' => 'required',
				'meta_des' => 'required',
				'category' => '',
				'post_img' => 'mimes:jpeg,bmp,gif,png'
			)
		);

		if ($validator->fails()) {
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		} else {
			$post = new Post;
			$post->title = $title;
			$post->is_approved = 1;
			$post->url = $url;
			$post->des = Input::get('des');
			$post->meta_des = $meta_des;

			$file_name = time();
			$file_name .= rand();
			$path = $_FILES['file']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			// $ext = Input::file('post_img')->getClientOriginalExtension();
			Input::file('post_img')->move(public_path() . "/uploads", $file_name . "." . $ext);
			$local_url = $file_name . "." . $ext;

			// Upload to S3
			$s3_url = URL::to('/') . '/uploads/' . $local_url;

			$post->image = $s3_url;

			$post->category = implode(',', $category);

			$link = str_replace(" ", "-", Input::get('title_tag')) . '-' . rand(0, 99);

			$post->link = $link;
			$post->title_tag = $title_tag;
			$post->save();

			$response_array = array('success' => true);
		}
		return Response::json($response_array);
	}


}


