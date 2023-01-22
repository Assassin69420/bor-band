<?php
include('db.php');
include('services/bills_services.php');

session_start();

$phone = "";

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$phone = $_SESSION["phone"];
	$user_id = $_SESSION["user_id"];

	if (isset($_POST["related_plan_id"]) && $_POST["related_plan_id"] !== '') {
		$related_service_id = $_POST["related_service_id"];
	} else if (isset($_POST["related_service_id"]) && $_POST["related_service_id"] !== '') {
		$related_plan_id = $_POST["related_plan_id"];
	}
	$bills_res = get_bill_userplanid($related_plan_id, $related_service_id, $db);
} else {
	header("location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyWebsite</title>
	<link rel="stylesheet" href="any.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Bubblegum+Sans|Caveat+Brush|Chewy|Lobster+Two');

		.profile-card-ctr {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 40px;
			flex-direction: column;
			min-height: 30rem;
			min-width: 10rem;
			background: white;
			border-radius: 3%;
		}

		.cards-table {
			margin-top: 10rem;
			display: flex;
			flex-direction: column;
			gap: 1rem;
		}

		.plan-name {
			margin-top: 1.5rem;
			padding: 2.5rem;
		}

		@media screen and (max-width: 576px) {
			.profile-card-ctr {
				flex-wrap: wrap;
			}
		}

		.profile-card__button {
			background: none;
			border: none;
			font-family: "Quicksand", sans-serif;
			font-weight: 700;
			font-size: 19px;
			margin: 15px 35px;
			padding: 15px 40px;
			min-width: 201px;
			border-radius: 50px;
			min-height: 55px;
			color: #fff;
			cursor: pointer;
			backface-visibility: hidden;
			transition: all 0.3s;

			margin-top: auto;
			padding-bottom: 1rem;
			margin-bottom: 2rem;
		}

		.profile-card-ctr {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 40px;
		}

		@media screen and (max-width: 576px) {
			.profile-card-ctr {
				flex-wrap: wrap;
			}
		}

		.profile-card__button:focus {
			outline: none !important;
		}

		@media screen and (min-width: 768px) {
			.profile-card__button:hover {
				transform: translateY(-8px);
			}
		}

		.profile-card__button.button--orange {
			background: linear-gradient(45deg, #141e30, #243b55);
			box-shadow: 0px 4px 30px #141e30;
		}

		.profile-card__button.button--orange:hover {
			box-shadow: 0px 7px 30px #03e9f4;
		}

		.td {
			padding-left: 110px;
		}

		.ts {
			padding-left: 210px;
		}

		.title {
			color: white;
		}

		.plansservices_display {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			flex-grow: 0;
		}

		.card-info {
			display: flex;
			align-items: center;
		}
	</style>
</head>

<body>
	<?php include_once 'components/navbar.php' ?>
	<div class="cards-table">

		<div class="plansservices_display">
			<?php if ($bills_res->num_rows > 0) : ?>
				<h2 class="title">Active Bills</h2>
				<div class="plan-card">
					<?php
					while ($obj = $bills_res->fetch_object()) {
						echo '
<table>
						<tr>
							<td>Total Charges</td>
							<td>₹' . $obj->amount . '</td>
						</tr>
						<tr>
							<td>cgst 9.5%</td>
							<td>₹<?php echo $total_cost * 0.095; ?></td>
						</tr>
						<tr>
							<td>sgst 9.5%</td>
							<td>₹<?php echo $total_cost * 0.095; ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>₹<?php echo ($total_cost * 0.19) + (int) $total_cost; ?></td>
						</tr>
					</table>
							<div class="profile-card-ctr">
								<div class="card-info">
									<h3 class="plan-name">' .
							$obj->plan_name . '
									</h3>
									<h2 class="plan-name">$' .
							$obj->plan_cost . '
									</h2>
									<form action="bills.php" method="POST">
										<button>View bills</button>
										<input type="hidden" name="related_plan_id" value"' . $obj->plan_id . '">
									</form>
								</div>
							</div>
						';
					}
					?>
				</div>
			<?php endif ?>
		</div>

		<div class="plansservices_display">
			<?php if ($user_hist[0]->num_rows > 0) : ?>
				<h2 class="title">Active Services</h2>
				<div class="plan-card">
					<?php
					while ($obj = $user_hist[0]->fetch_object()) {
						echo '
							<div class="profile-card-ctr">
								<div class="card-info">
									<h3 class="plan-name">' .
							$obj->service_name . '
									</h3>
									<h2 class="plan-name">₹' .
							$obj->service_cost . '
									</h2>
									<h2 class="plan-name">
									<form action="bills.php" method="POST">
										<button>View bills</button>
										<input type="hidden" name="related_service_id" value"' . $obj->service_id . '">
									</form>
									</h2>
								</div>
							</div>
						';
					}
					?>
				</div>
			<?php endif ?>
		</div>
	</div>

	<script src="home.js"></script>

</body>

</html>
