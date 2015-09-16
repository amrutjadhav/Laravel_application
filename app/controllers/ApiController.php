<?php

class ApiController extends \BaseController {

	public function getCategory()
	{
		$category = Category::all();
		if($category)
		{
			$response_array = array('success' => true,'category' => $category);
		}
		else
		{
			$response_array = array('success' => false, 'error_msg' => "no data");
		}
		return Response::json($response_array);
	}

	public function postDetails()
	{
		$posts = Post::where('is_approved',1)->get();
		$datas = array();
		foreach ($posts as $post) 
		{
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
		$response_array = array('success' => true,'posts' => $datas);

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
		}
		else
		{
			if (!$cat) {
				$posts = Post::where('is_approved', 1)->take($take)->skip($skip)->get();
				$counts = Post::where('is_approved',1)->count();
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
					$data['count'] = $counts;
					$data['share_link'] = $link;
					array_push($datas, $data);
				}
				$response_array = array('success' => true, 'posts' => $datas, 'counts' => $counts);
			} else {
				$postss = Post::where('is_approved', 1)->where('category', 'like', '%' . $cat . '%')->take($take)->skip($skip)->get();
				$counts = Post::where('is_approved',1)->where('category', 'like', '%' . $cat . '%')->count();
				$datas = array();
				foreach ($postss as $post) {
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
				'device_token' => 'required|integer',
				'device_type' => 'required|integer',
			)
		);

		if ($validator->fails()) 
		{
			$error_messages = $validator->messages()->all();
			$response_array = array('success' => false, 'error' => 'Invalid Input', 'error_code' => 401, 'error_messages' => $error_messages);
			$response_code = 200;
		}
		else
		{
			$finding_device = MobileRegister::whereDevice_token($device_token)->count();
			if($finding_device == 0){
				$add_device = new MobileRegister;
				$add_device->device_type = $device_type;
				$add_device->device_token = $device_token;
				$add_device->save();

				$response_array = array('success' => true, 'message' => "Device Register Successfully");
			}else{
				$response_array = array('success' => false, 'message' => "Device Already Registered");
			}
			
		}

		return Response::json($response_array);

	}

}