<?php 

// page counter

function counter($page){

	$count_home = Counter::wherePage($page)->where('created_at', '>=', new DateTime('today'));

		if($count_home->count() > 0){
			$update_count = $count_home->first();
			$update_count->count = $update_count->count + 1;
			$update_count->save();
		}else{
			$create_count = new Counter;
			$create_count->page = $page;
			$create_count->count = 1;
			$create_count->save();
		}
}




 ?>