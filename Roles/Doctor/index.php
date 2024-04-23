<?php
include('./db/config.php');
session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in
    $username = $_SESSION['SESSION_USERNAME'];

    

    // Retrieve user id from the database
    $result = $con->query("SELECT doc_id FROM doctors WHERE username = '$username'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $loggedUserId = $row['doc_id'];
    } else {
        // Handle the case when the user is not found in the database
        echo "Error: User not found in the database.";
        exit();
    }

    $con->close();
} else {
    // User is not logged in
    echo "User is not logged in";
    header("Location: ./login.php");
    exit();
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
		<title>MediPlus - Doctor</title>


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

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- Header start -->
		<header class="header">
			<div class="container-fluid">

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-sm-4 col-4">
						<a href="index.html" class="logo">Medi<span>Plus</span></a>
						<a href="index.html" class="logo"><span>-</span></a>
						<a href="index.html" class="logo"><span>Doctor</span></a>
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
							<a class="nav-link active-page" href="../Doctor/index.php">
								<i class="icon-devices_other nav-icon"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								Management
							</a>
							<ul class="dropdown-menu" aria-labelledby="doctoRs">
							
								<li>
									<a class="dropdown-item" href="hospital-patients.php">Patients</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-appointments.php">Appointments</a>
								</li>
								<li>
									<a class="dropdown-item" href="hospital-lab-reports.php">Reports</a>
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


				

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS app_count FROM appointments WHERE doctor = '$loggedUserId'";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $appCount = $row['app_count'];
} else {
    $appCount = 0;
}

?> 
					<div class="row gutters">
						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/appointment.svg" alt="Quality Dashboards" />
								<p>My Appointments</p>
								<h2><?php echo $appCount; ?></h2>
							</div>
						</div>
						<?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS patient_count FROM patients";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patientCount = $row['patient_count'];
} else {
    $patientCount = 0;
}

?> 
						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/patient.svg" alt="Best Dashboards" />
								<p>Patients</p>
								<h2><?php echo $patientCount; ?></h2>
							</div>
						</div>
					
   <?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS doctor_count FROM doctors";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $doctorCount = $row['doctor_count'];
} else {
    $doctorCount = 0;
}

?> 

						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/doctor.svg" alt="Top Dashboards" />
								<p>Total Doctors</p>
								<h2><?php echo $doctorCount; ?></h2>
							</div>
</div>
					
					</div>
					<!-- Row end -->

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-lg-6 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Today Appointments</div>
								</div>
								<div class="card-body">
								<?php
							    $todayDate = date("Y-m-d");

    $query = "SELECT * FROM appointments WHERE date = '$todayDate' AND doctor = '$loggedUserId' ";
    $sql = mysqli_query($con, $query); 
 while ($row = mysqli_fetch_array($sql)) {  
        ?>

									<div class="card" style="width: 18rem;">
										<div class="card-body">
										  <h5 class="card-title">Date:<?php echo $row["date"]; ?></h5>
										  <h4 class="card-body"> <?php echo $row["patient"]; ?></h5>
										  <h6 class="card-subtitle mb-2 text-body-secondary">Time : <?php echo $row["time_slot"]; ?></h6>
										  <p class="card-text">Sample Description about the sickness</p>
										</div>							
									  </div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<!-- Row end -->


					<!-- Row start -->
			
					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			<footer class="main-footer">©MediPlus Hostpitals All Rights Reserved</footer>

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

		<!-- Apex Charts -->
		<script src="vendor/apex/apexcharts.min.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-column-graph.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
		<script src="vendor/apex/examples/bar/hospital-patients-by-age.js"></script>

		<!-- Rating JS -->
		<script src="vendor/rating/raty.js"></script>
		<script src="vendor/rating/raty-custom.js"></script>

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

	</body>

</html>