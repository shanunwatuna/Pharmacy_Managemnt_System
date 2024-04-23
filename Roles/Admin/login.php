<?php
include("./db/config.php");
session_start();

$msg = ""; // Initialize the message variable

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($con)); // Check for query error and display it
    }

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['SESSION_USERNAME'] = $username;
        header("Location: index.php");
        exit(); // Make sure to add an exit() after the header redirect
    } else {
        $msg = "<div class='alert alert-danger'>Username or password is invalid. Please try again.</div>";
    }
}

?>

<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap Dashboards">
		<meta name="author" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="img/favicon.svg" />

		<!-- Title -->
		<title>Mediplus</title>

		<!-- *****
			**** Common Css Files *****
			**** -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">

			<form action="" method="post">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									MediPlus 
								</a>
								<h5>Admin Login,<br />Please Login to your Account.</h5>
								
								<?php echo $msg; // Display error message ?>

								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="User name" required/>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password" required/>
								</div>
								<div class="actions">
									<button type="submit" name="submit" class="btn btn-info">Login</button>
								</div>
								<p>Press <a href="http://localhost/mediplus/loginportal.php"><b>HERE</b></a> to go back</p>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>

</html>
