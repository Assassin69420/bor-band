<?php
include('../db.php');
include('broband_servies.php');
include('plan_services.php');
include('user_services.php');

session_start();

$username = "";
$page = "plans";

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$username = $_SESSION["username"];
	$plan_id = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["1"])) {
			$plan_id = "1";
		} else if (isset($_POST["2"])) {
			$plan_id = "2";
		} else if (isset($_POST["3"])) {
			$plan_id = "3";
		}

		if (isset($plan_id) && $plan_id !== '') {
			$user_res = get_user_details($username, $db);
			$user_id = $user_res['U_id'];

			echo var_dump($user_id);
			echo var_dump($plan_id);

			/* exit; */
			purchase_plan($plan_id, $user_id,  $db);
			header("location: /your_plan.php");
			exit;
		}
	} else {
		header("location: /plans.php");
		exit;
	}
} else {
	header("location: login.php");
	exit;
}
