

<?php   
  include("db/config.php");

  session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in

} else {
    // User is not logged in
    echo "User is not logged in";
    header("Location: ./login.php");
}


  if(isset($_POST["submit"]))
  {
      //post all value
      extract($_POST);
      $query = "INSERT INTO `pharmacy` (`pharma_id`, `fullname`,`email`, `qualification`,`address`,`bio`,`username`,`password`) VALUES (NULL, '".$fullname."', '".$email."','".$qualification."','".$address."','".$bio."','".$username."','".$password."');";

      mysqli_query($con,$query);
      header("Location: hospital-add-Pharmacist.php");

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
		<title>Medical Admin Template - Add Doctor</title>


		<!-- *************
			************ Common Css Files *************
			************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">

		<!-- Main css -->
		<link rel="stylesheet" href="css/main.min.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>

	<body>

		<!-- Header start -->
		<!-- Header start -->
		<header class="header">
			<div class="container-fluid">

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-sm-4 col-4">
						<a href="index.html" class="logo">Medi<span>Plus</span></a>
						<a href="index.html" class="logo"><span>-</span></a>
						<a href="index.html" class="logo"><span>admin</span></a>
					</div>
					<div class="col-sm-8 col-8">

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown d-none d-sm-block">
								<a href="#" class="contact">
									<i class="icon-phone"></i> 012 345 6789
								</a>
							</li>
							
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"><?php echo $_SESSION['SESSION_USERNAME']; ?></span>
									<span class="avatar">A<span class="status busy"></span></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="img/user11.png" alt="Medical Dashboards" />
											</div>
										
											<p><?php echo $_SESSION['SESSION_USERNAME']; ?></p>
										</div>
										<a href="account-settings.php"><i class="icon-user1"></i> My Profile</a>
										<a href="logout.php"><i class="icon-log-out1"></i> Sign Out</a>
									</div>
								</div>
							</li>
						</ul>
						<!-- Header actions end -->

					</div>
				</div>
				<!-- Row end -->

			</div>
		</header>
		<!-- Header end -->

		<!-- *************
			************ Header section end *************
		************* -->


		<div class="container-fluid">


			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar"
					aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="royalHospitalsNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active-page" href="index.php">
								<i class="icon-devices_other nav-icon"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								Staff
							</a>
							<ul class="dropdown-menu" aria-labelledby="doctoRs">
								<li>
									<a class="dropdown-item" href="hospital-doctors-list.php">Doctors List</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-doctors.php">Doctors</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-patients.php">Patients</a>
								</li>
								<li>
									<a class="dropdown-item" href="lab-technisian.php">Lab Technisians</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-pharmacists.php">Pharmacist</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-add-doctor.php">Add Doctor</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-add-Pharmacist.php">Add Pharmacist</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-add-lab.php">Add Lab Technisian</a>
								</li>
								
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-book-open nav-icon"></i>
								Management
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="calendar.php">Callender</a>
								</li>
								<li>
									<a class="dropdown-item" href="appointments.php">Appointments</a>
								</li>
								<li>
									<a class="dropdown-item" href="reports.php">Reports</a>
								</li>
								
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Navigation end -->


			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">


		
				<!-- Page header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">
						<form method="post">
						<div class="col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Enter Pharmacist Details</div>
								</div>
								<div class="card-body">
									<div class="row gutters">
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="fullName">Full Name</label>
												<input type="text" name="fullname" class="form-control" id="fullName" placeholder="full name" required>
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="inputEmail">Email</label>
												<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email here" required>
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="education">Qualification</label>
												<input type="text" name="qualification" class="form-control" id="education" placeholder="Qualification" required>
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="addreSs">Full Address</label>
												<textarea class="form-control" name="address" id="addreSs" rows="3" placeholder="Current Address" required></textarea>
											</div>
										</div>
										<div class="col-sm-6 col-12">
											<div class="form-group">
												<label for="biO">Bio</label>
												<textarea class="form-control" name="bio" id="biO" rows="3" placeholder="Description" required></textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label for="userName">User Name</label>
												<input type="text" name="username" class="form-control" id="userName" placeholder="User Name" required>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
											</div>
										</div>
										<button class="btn-primary" type="submit" name="submit">Create Profile</button>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>

					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			<footer class="main-footer"></footer>

		</div>

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

	</body>

</html>