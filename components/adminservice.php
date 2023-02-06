<?php
include('../db.php');
include('../services/broband_servies.php');
include('Admin_Trial_Backend.php');

$all_services = get_all_offered_services($db);

if (isset($_POST['add_service'])) {
	$service_name = $_POST['service_name'];
	$cost = $_POST['cost'];
	enter_service($service_name, $cost, $db);
	header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body {
		background: linear-gradient(#141e30, #243b55);
		font-smooth: auto;
		background-repeat: repeat -y;
	}

	body::after {
		display: none;
		content: '';
		position: absolute;
		width: 100%;
		height: 100%;
		background: black;
		opacity: 0.15;
	}

	.body-wrapper {
		width: 1000px;
		height: 600px;
		margin: 165px auto;
	}

	.body-wrapper .panel {
		width: 1000px;
		height: 600px;
		background: #243b55;
		border-radius: 10px;
		box-shadow: 0px 10px 50px 5px rgba(0, 0, 0, 0.1);
		z-index: 8;
		overflow: hidden;
	}

	.body-wrapper .panel .aside {
		width: 83px;
		height: 600px;
		float: left;
		margin-left: 5px;
		position: relative;
		border-right: 1px solid rgba(0, 0, 0, 0.1);
		box-sizing: border-box;
	}

	.body-wrapper .panel .aside .avatar {
		width: 55px;
		height: 55px;
		border-radius: 50%;
		background-color: black;
		margin: auto;
		margin-top: 20px;
		overflow: hidden;
		transition: all 0.3s cubic-bezier(0.38, -0.9, 0.5, 2.5);
	}

	.body-wrapper .panel .aside .avatar:hover {
		transform: scale(1.1);
	}

	.body-wrapper .panel .aside .avatar img {
		position: relative;
		width: 55px;
		height: 55px;
	}

	.body-wrapper .panel .aside .seperator {
		width: 50px;
		height: 1px;
		background: #03e9f4;
		opacity: 0.25;
		margin: 18px auto 36px auto;
	}

	.body-wrapper .panel .aside .list {
		width: 100%;
		height: auto;
		text-align: right;
		padding-right: 14px;
		box-sizing: border-box;
		font-size: 11px;
		font-family: "Lato";
		color: solid #141e30;
	}

	.body-wrapper .panel .aside .list .item {
		height: 23px;
		line-height: 23px;
		width: 100%;
		margin-bottom: 17px;
		position: relative;
		cursor: pointer;
		transition: all 0.1s ease-in-out;
	}

	.body-wrapper .panel .aside .list .item:hover {
		color: #03e9f4;
	}

	.body-wrapper .panel .aside .list .item.selected {
		font-weight: bold;
	}

	.body-wrapper .panel .aside .list .item.selected::after {
		content: '';
		display: block;
		position: absolute;
		top: 0;
		right: -14px;
		width: 3px;
		height: 23px;
		background: #03e9f4;
	}

	.body-wrapper .panel .aside .list .item.selected:hover {
		color: #03e9f4;
	}

	.body-wrapper .panel .aside button {
		position: relative;
		margin-top: 163px;
		font-size: 11px;
		margin-left: 10px;
		background:  none;
		border: none;
		color: #e53935;
		font-weight: bold;
		text-align: center;
		cursor: pointer;
	}

	.body-wrapper .panel .aside button:hover {
		color: #eb6562;
		text-decoration: none;
	}

	.body-wrapper .panel .aside::before {
		content: '';
		display: block;
		width: 5px;
		height: 600px;
		background: #03e9f4;
		border-radius: 10px 0px 0px 10px;
		position: absolute;
		top: 0;
		left: -5px;
	}

	.body-wrapper .panel .view {
		width: 912px;
		height: 1000px;
		background: linear-gradient(#141e30, #243b55);
		float: left;
		padding: 65px 77px;
		box-sizing: border-box;
		position: relative;
	}

	.body-wrapper .panel .view .sub-title {
		position: absolute;
		font-size: 9px;
		letter-spacing: 5px;
		opacity: 0.4;
		color: #03e9f4;
		font-weight: bold;
		top: 22px;
		right: 32px;
	}

	.body-wrapper .panel .view .main-title {
		font-size: 32px;
		letter-spacing: 10px;
		color: #03e9f4;
		font-weight: light;
	}

	.body-wrapper .panel .view .seperator,
	.body-wrapper .panel .view .min-seperator {
		width: 600px;
		height: 1px;
		background: #03e9f4;
		opacity: 0.25;
		margin-top: 10px;
		margin-bottom: 45px;
	}

	.body-wrapper .panel .view .min-seperator {
		width: 380px;
		margin-left: 78px;
		margin-top: 80px;
		margin-bottom: 45px;
	}


	body {
		-webkit-tap-highlight-color: #03e9f4;
	}

	.list .item a {
		text-decoration: none;
		color: white;
	}

	.list .selected a {
		font-size: 12px;
		color: #03e9f4;
	}

	.profile-card__button {
		background: none;
		border: none;
		font-family: "Quicksand", sans-serif;
		font-weight: 700;
		font-size: 15px;
		min-width: 100px;
		margin-right: 20px;
		border-radius: 50px;
		min-height: 55px;
		color: #fff;
		cursor: pointer;
		backface-visibility: hidden;
		transition: all 0.3s;
	}

	.profile-card__button.button--orange {
		background: linear-gradient(45deg, #141e30, #243b55);
		box-shadow: 0px 4px 30px #141e30;
	}

	@media screen and (max-width: 768px) {
		.profile-card__button {
			min-width: 170px;
		}
	}

	@media screen and (max-width: 576px) {
		.profile-card__button {
			min-width: inherit;
			margin: 0;
			margin-bottom: 16px;
			width: 100%;
			max-width: 300px;
		}

		.profile-card__button:last-child {
			margin-bottom: 0;
		}
	}

	.profile-card__button:focus {
		outline: none !important;
	}

	@media screen and (min-width: 768px) {
		.profile-card__button:hover {
			transform: translateY(-5px);
		}
	}

	.green:hover {
		box-shadow: 0px 7px 30px green;
	}

	.red:hover {
		box-shadow: 0px 7px 30px red;
	}
	.view form label {
		color: #03e9f4;
	}
	.view form input {
		border-radius: 10px;
		border: none; 
	}
	.label-text-container span {
		color: #03e9f4;
	}
	:root {

}

.cards::-webkit-scrollbar {
	height: 12px;
}
.cards::-webkit-scrollbar-thumb,
.cards::-webkit-scrollbar-track {
  border-radius: 92px;
}

.cards::-webkit-scrollbar-thumb {
  background: #03e9f4;
}

.cards::-webkit-scrollbar-track {
  background: #141e30;
}
@media (min-width: 500px) {
  .card {
    flex-basis: calc(50% - 10px);
  }

  .card:not(:last-child) {
    margin-right: 20px;
  }
}

@media (min-width: 700px) {
  .service_card {
    flex-basis: calc(calc(100% / 3) - 20px);
  }

  .service_card:not(:last-child) {
    margin-right: 30px;
  }
}
@media (min-width: 1100px) {
  .card {
    flex-basis: calc(25% - 30px);
  }

  .card:not(:last-child) {
    margin-right: 40px;
  }
}
.cards {
  display: flex;
  padding: 25px 0px;
  list-style: none;
  overflow-x: scroll;
  scroll-snap-type: x mandatory;
}
.card {
  display: flex;
  flex-direction: column;
  flex: 0 0 15%;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 15%);
  scroll-snap-align: start;
  transition: all 0.2s;
}
</style>

<body>
	<div class="body-wrapper">
		<div class="panel">
			<div class="aside">
				<div class="avatar"><img src="https://66.media.tumblr.com/avatar_faa95867d2b3_128.png" /></div>
				<div class="seperator"></div>
				<div class="list">
					<div class="item"><a href="admin.php">GENERAL</a></div>
					<div class="item selected"><a href="adminservice.php"> SERVICES</a></div>
					<div class="item"><a href="adminplans.php">PLANS</a></div>
					<div class="item"><a href="adminUsers.php">Users</a></div>
				</div>
				<div class="log-out">
					<a href="/services/logout.php">
						<button class="">Log Out</button>
					</a>
				</div>
			</div>
			<div class="view">
				<div class="sub-title">ADMIN PANEL</div>
				<div class="main-title">Services</div>
				<div class="seperator"></div>
				<form action="" method="post">
					<label for="service_name">Service Name</label>
					<input name="service_name">
					<label for="cost">Cost</label>
					<input name="cost">
					<input name="add_service" type="hidden">
					<button class="profile-card__button button--orange green">ADD</button>
				</form>
				<div class="seperator"></div>
				<div class="">
					<div class="cards">
						<?php
						while ($obj = $all_services->fetch_object()) {
							echo '
							<div class="card">
							 <p class="label-text-container"> 
								<span class="label-text">Service Name:</span>
								<span class="label-value">' . $obj->service_name . '</span>
								<div style="color: white;">	
								<span class="label-value">₹' . $obj->cost . '</span>
								</div>
							 </p>
							 <input type="hidden" name="remove_service" value="' . $obj->id . '">
							</div>
					  ';
						}
						?>
					</div>
				</div>

			</div>
			<div class="clear-fix"></div>
		</div>
	</div>
</body>

</html>
