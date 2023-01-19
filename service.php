<?php
include('db.php');
include('services/broband_servies.php');

$all_services = get_all_services($db);
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
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Bubblegum+Sans|Caveat+Brush|Chewy|Lobster+Two');


		body {
			width: 100%;
			height: 100%;
			background: linear-gradient(#141e30, #243b55);

		}

		html {
			width: 100%;
			height: 100%;
		}

		.navbar {
			background: linear-gradient(135deg, #141e30, #03e9f4, #141e30);
			border: 0;
			z-index: 9999;
			letter-spacing: 4px;

		}

		.logo {
			display: block;
			height: auto;
			width: 52px;
			padding-top: 5px;
			margin-right: 15px;
		}

		.navbar-brand>img {
			height: 100%;
			padding: 15px;
			/* firefox bug fix */
			width: auto;
		}

		.navbar .nav>li>a {
			line-height: 50px;
		}

		.navbar-header h1 {
			letter-spacing: 1px;
			color: black !important;
			font-family: 'Lobster Two', cursive;
		}

		.navbar li a,
		.navbar {
			color: black !important;
			font-size: 12px;
			transition: all 0.6s 0s;
		}

		.navbar-toggle {
			background-color: transparent !important;
			border: 0;
		}

		.navbar-nav li a:hover,
		.navbar-nav li a.active {
			color: white !important;
		}

		.service_card {
			align-items: flex-start;
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
		}

		.label-text-container {
			display: flex;
			flex-direction: column;
			gap: 0.7rem;
		}

		.label-text {
			font-size: 17px;
			font-weight: bold;
		}

		.label-value {
			margin-left: 0.9rem;
		}
	</style>
</head>

<body>
	<?php include_once 'components/navbar.php' ?>
	<div class="service_card-container">
		<?php
		while ($row = $all_services->fetch_assoc()) {
			echo '<div class="service_card">';
			echo '<div class="profile-card__img">';
			echo '<img src="https://mediaim.expedia.com/destination/1/2d75301e5fa5840846672492693f1fb3.jpg" alt="profile card">';
			echo '</div>';
			echo '<div class="card_content">';
			echo '<p class="label-text-container"> <span class="label-text">Service Name </span> ', '<span class="label-value">', $row['S_name'], '</span>', '</p>';
			echo '<p class="label-text-container"> <span class="label-text">City </span>', '<span class="label-value">', $row['S_city'], '</span>', '</p>';
			echo '<p class="label-text-container"> <span class="label-text">Phone </span>', '<span class="label-value">', $row['S_phone'], '</span>', '</p>';
			echo '<p class="label-text-container"> <span class="label-text">Amount </span>', '<span class="label-value">', $row['S_amount'], '</span>', '</p>';
			echo '</div>';
			echo '</div>';
		}
		?>
	</div>

</body>

</html>
