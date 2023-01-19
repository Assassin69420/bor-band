<?php
function get_all_services($db)
{
	//connect to database
	$sql = "SELECT S_id, S_name, S_city, S_phone, S_amount, Of_id FROM service";

	$res = mysqli_query($db, $sql);
	return $res;
}

function get_all_plans($db)
{
	//connect to database
	$sql = "SELECT Plan_id, Plan_Name, Plan_starting_Date, Plan_ending_Date, Plan_amount FROM plans";

	$res = mysqli_query($db, $sql);
	return $res;
}
