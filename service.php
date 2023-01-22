<?php
include('db.php');
include('services/broband_servies.php');

$all_services = get_all_offered_services($db);
$page = "service";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyWebsite</title>
	<link rel="stylesheet" href="service.css">
	<link rel="stylesheet" href="profile.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		.service_card {
			flex-grow: 0;
			flex-direction: column;
			align-items: flex-start;
			align-items: center;
			padding: 1rem;
			background-color: white;
			color: black;
			border-radius: 4%;
		}

		.profile-card__button {
			margin: unset !important;
		}

		.service_card_img img {
			max-height: 100%;
			max-width: 100%;
		}

		.service_card-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			gap: 1rem;
			color: white;
			background: linear-gradient(360deg, #141e30, #243b55);
			border-radius: 15px;
			border: 2px solid #243b55;
			padding: 50px;
			margin-top: 10rem;
			width: 90%;
			height: 700px;
			margin-right: auto;
			margin-left: auto;
			align-items: flex-start;
		}

		.label-text-container {
			display: flex;
			flex-direction: column;
			align-items: center;
			gap: 0.7rem;
		}

		.label-text {
			font-size: 17px;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<?php include_once 'components/navbar.php' ?>
	<form action="confirm_purchase.php" class="service_card-container" method="POST">
		<?php
		while ($obj = $all_services->fetch_object()) {
			echo '
						 <div class="service_card">
							 <p class="label-text-container"> 
								<span class="label-text">Service Name </span>
								<span class="label-value">' . $obj->service_name . '</span>
							 </p>
							 <p class="label-text-container">
									<span class="label-text">Amount </span><span class="label-value">₹' . $obj->cost . '</span>
							 </p>
							 <input type="hidden" name="service" value="' . $obj->id . '">
							 <button type="submit" class="profile-card__button button--orange">Purchase</button>
						 </div>
					  ';
		}
		?>
	</form>

</body>

</html>
