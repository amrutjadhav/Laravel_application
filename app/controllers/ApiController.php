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

}