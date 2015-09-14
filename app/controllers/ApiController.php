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
		$type = 1;
		$skip = 2;
		if(!$cat)
		{
			$posts = Post::where('is_approved',1)->take(2)->skip(1)->get();
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
		}
		else
		{
			$postss = Post::where('is_approved',1)->where('category', 'like', '%'.$cat.'%')->take(2)->skip(1)->get();
			$datas = array();
			foreach ($postss as $post) 
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
		}
		return Response::json($response_array);
	}

	public function register()
	{
//		$device =
	}

}