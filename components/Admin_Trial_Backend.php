

<?php

//The admin panel is separated into 4 html files for the home page->admin.html, plans->adminplans.html
//for service->adminservice.html and for users->adminUsers.html.

//A basic interface where we simply enter the values for creating new services and plans rather than inserting with query in the database.

//Viewing Users who have registered into the database.

include('../db.php');

$service_name=$cost="";

$plan_name=$speed=$fup_limit=$min_first_bill_period="";

$details='[]';
//Those are the queries, post method is supposed to be used, I haven't.
//Inserting into the service table for the interface in the admin panel at /components/adminservice.html.

function enter_services(int $id, string $service_name, int $cost, mysqli $db){
	$enter_service_sql = " INSERT INTO 
									services(id, service_name, cost) 
													VALUES
							(DEFAULT, '$service_name', $cost); "
	
	$db->begin_transaction();
	try {
		$plan_in_res = $db->query($enter_service_sql);
			$db->commit();
			return $plan_in_res;
		} else {
			$db->rollback();
			throw 'some error';
		}
	} catch (mysqli_sql_exception $exception) {
		$db->rollback();
		throw $exception;
	}

}

//Inserting into the internet_plans table for the interface in the admin panel at /components/adminplans.html. 

function enter_plans(int $id, string $plan_name, json $details, int $speed, int $cost, int $fup_limit, enum $min_bill_period, mysqli $db){
	$enter_plan_sql = "INSERT INTO 
						insert_plans(id, plan_name, details, internet_speed, cost, fup_limit, min_first_bill_period) 
														VALUES
						(DEFAULT, '$plan_name', $details, $speed, $cost, $fup_limt, $min_first_bill_period);
	
	
	"
		$db->begin_transaction();
	try {
		$service_in_res = $db->query($enter_plan_sql);
			$db->commit();
			return $service_in_res;
		} else {
			$db->rollback();
			throw 'some error';
		}
	} catch (mysqli_sql_exception $exception) {
		$db->rollback();
		throw $exception;
	}

}

//For Displaying all the user details in the Admin panel at /components/adminUsers.html.

function display_users(string $id, mysqli $db){
	$Display_users_sql = "SELECT * FROM useraccount;"
	
	$Display_res = mysqli_query($db, $Display_users_sql);
	
	return $Display_res;

}
?>