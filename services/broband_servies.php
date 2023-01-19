<?php
function get_all_services($db)
{
	//connect to database
	$sql = "SELECT S_id, S_name, S_city, S_phone, S_amount, Of_id, img FROM service";

	$res = mysqli_query($db, $sql);
	return $res;
}
