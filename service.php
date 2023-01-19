<?php
include('db.php');
include('services/broband_servies.php');

$all_services = get_all_services($db);
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

		.wrap {
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
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="glyphicon glyphicon-menu-hamburger"></span>
				</button>


				<div class="navbar-left logo">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 291 385.3" style="enable-background:new 0 0 291 385.3;" xml:space="preserve">
						<style type="text/css">
							.st0 {
								fill: #000;
							}
						</style>
						<polygon class="st0" points="82.1,12 7.4,138.7 38.7,237.3 " />
						<polygon class="st0" points="92.7,5.3 199.4,8.7 223.4,82.7 " />
						<polygon class="st0" points="89.4,8.7 223.4,86.7 42.1,237.3 " />
						<polygon class="st0" points="206.1,15.3 262.7,66 228.1,82.7 " />
						<polygon class="st0" points="262.7,70 228.1,86 266.4,175.3 " />
						<polygon class="st0" points="228.1,92.7 262.7,179.3 173.4,328 " />
						<polygon class="st0" points="223.4,92.7 44.7,240 167.7,336 " />
						<polygon class="st0" points="252.1,210.3 184.4,380.3 170.7,339.7 " />
						<polygon class="st0" points="60.1,260.3 167.4,341 180.4,380.3 " />
					</svg>
				</div>
				<h1 class="brand brand-name navbar-left">
					<div class="navbar-left">Bro Band
				</h1>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="service.php" class="active">Service</a></li>
					<li><a href="plans.html">Plans</a></li>
					<li><a href="profile.php">Profile</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="wrap">
		<?php
		while ($row = $all_services->fetch_assoc()) {
			echo '<div class="service_card">';
			echo '<div class="profile-card__img">';
			echo '<img src="https://mediaim.expedia.com/destination/1/2d75301e5fa5840846672492693f1fb3.jpg" alt="profile card">';
			echo '</div>';
			echo '<div class="card_content">';
			echo '<p> S_id: ', $row['S_id'], '</p>';
			echo '<p> S_City: ', $row['S_city'], '</p>';
			echo '<p> S_phone: ', $row['S_phone'], '</p>';
			echo '<p> S_phone: ', $row['S_amount'], '</p>';
			echo '<p> Of_id: ', $row['Of_id'], '</p>';
			echo '</div>';
			echo '</div>';
		}
		?>
	</div>

</body>

</html>
