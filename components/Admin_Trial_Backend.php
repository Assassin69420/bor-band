<?php

//The admin panel is separated into 4 html files for the home page->admin.html, plans->adminplans.html
//for service->adminservice.html and for users->adminUsers.html.

//A basic interface where we simply enter the values for creating new services and plans rather than inserting with query in the database.

//Viewing Users who have registered into the database.

$service_name = $cost = "";

$plan_name = $speed = $fup_limit = $min_first_bill_period = "";

$details = '[]';
//Inserting into the service table for the interface in the admin panel at /components/adminservice.html.

function get_stats(mysqli $db)
{
	$p_count_sql = "select count(*) as count from internet_plans";
	$s_count_sql = "select count(*) as count from services";
	$u_count_sql = "select count(*) as count from useraccount;";

	$p_count = $db->query($p_count_sql)->fetch_object()->count;
	$s_count = $db->query($s_count_sql)->fetch_object()->count;
	$u_count = $db->query($u_count_sql)->fetch_object()->count;
	return array($p_count, $s_count, $u_count);
}

function enter_service(string $service_name, int $cost, mysqli $db)
{
	$enter_service_sql = "INSERT INTO services(id, service_name, cost) VALUES (DEFAULT, '$service_name', $cost);";
	$db->query($enter_service_sql);
}

/* //Inserting into the internet_plans table for the interface in the admin panel at /components/adminplans.html. */
function enter_plans(string $plan_name, int $speed, int $cost, int $fup_limit, string $min_bill_period, mysqli $db)
{
	$details = '[]';
	$enter_plan_sql = "INSERT INTO internet_plans 
											(id, plan_name, details, internet_speed, cost, fup_limit, min_first_bill_period)
										 VALUES 
											(DEFAULT, '$plan_name', '$details', '$speed', '$cost', '$fup_limit', '$min_bill_period');
	";
	$db->query($enter_plan_sql);
}

/* //For Displaying all the user details in the Admin panel at /components/adminUsers.html. */

function display_users(mysqli $db)
{
	$Display_users_sql = "SELECT id,name,phone,address from useraccount U;";
													/* LEFT JOIN user_plan_tracker UP on U.id = UP.user_id */ 
													/* 	INNER JOIN internet_plans P on P.id = UP.plan_id */
													/* LEFT JOIN user_service_tracker US on U.id = US.user_id */
													/* 	INNER JOIN services S on S.id = US.service_id */ 
													/* 	"; */

	$Display_res = $db->query($Display_users_sql);
	return $Display_res;
}

