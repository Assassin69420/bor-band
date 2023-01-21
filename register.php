<?php
// Include config file
require_once "db.php";
include 'services/user_services.php';

// Define variables and initialize with empty values
$phone = $name = $address = $password = $confirm_password = "";
$phone_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty(trim($_POST["phone"]))) {
		$phone_err = "Please enter a phone number.";
	} elseif (!preg_match('/^[0-9]+$/', trim($_POST["phone"]))) {
		$phone_err = "phone number can only numbers";
	} else {
		// Prepare a select statement
		$sql = "SELECT user_id FROM ulogin WHERE phone = ?";

		if ($stmt = mysqli_prepare($db, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $param_phone);
			$param_phone = trim($_POST["phone"]);
			if (mysqli_stmt_execute($stmt)) {
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) == 1) {
					$phone_err = "This phone number is already in use.";
				} else {
					$phone = trim($_POST["phone"]);
					$name = trim($_POST["name"]);
					$address = trim($_POST["address"]);
					$password = trim($_POST["password"]);
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}

	// Validate password
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} elseif (strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have atleast 6 characters.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate confirm password
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if (empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}

	// Check input errors before inserting in database
	if (empty($phone_err) && empty($password_err) && empty($confirm_password_err)) {
		try {
			$user_id = register_user(phone: $phone, name: $name, address: $address, password: $password, db: $db);
			header("location: login.php");
		} catch (\Throwable $th) {
			echo "Oops! Something went wrong. Please try again later.";
			echo $th;
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			font: 14px sans-serif;
		}

		.wrapper {
			width: 360px;
			padding: 20px;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<h2>Sign Up</h2>
		<p>Please fill this form to create an account.</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group">
				<label>Phone number</label>
				<input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
				<span class="invalid-feedback"><?php echo $phone_err; ?></span>
			</div>

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label>Address</label>
				<input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
				<span class="invalid-feedback"></span>
			</div>


			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
				<span class="invalid-feedback"><?php echo $password_err; ?></span>
			</div>

			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
				<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Submit">
				<input type="reset" class="btn btn-secondary ml-2" value="Reset">
			</div>

			<p>Already have an account? <a href="login.php">Login here</a>.</p>
		</form>
	</div>
</body>

</html>
