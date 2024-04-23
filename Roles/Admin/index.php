<?php
session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in

} else {
    // User is not logged in
    echo "User is not logged in";
    header("Location: ./login.php");
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
		<title>MediPlus - Admin</title>


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


			

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS app_count FROM appointments";
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
								<p>Appointments</p>
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
  	 $sql = "SELECT COUNT(*) AS report_count FROM files";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reportCount = $row['report_count'];
} else {
    $reportCount = 0;
}

?> 
						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/operation.svg" alt="Best Dashboards" />
								<p>Pending Reports</p>
								<h2><?php echo $reportCount ?></h2>
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
								<p>Doctors</p>
								<h2><?php echo $doctorCount; ?></h2>
							</div>
						</div>
						<?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS lab_count FROM lab_technisian";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $labCount = $row['lab_count'];
} else {
    $doctorCount = 0;
}

?> 
						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/staff.svg" alt="Top Dashboards" />
								<p>Laboratary Technisisans</p>
								<h2><?php echo $labCount; ?></h2>
							</div>
						</div>
						<?php
     include("db/config.php");  
  	 $sql = "SELECT COUNT(*) AS pharma_count FROM pharmacy";
	$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pharCount = $row['pharma_count'];
} else {
    $doctorCount = 0;
}

?> 
						<div class="col-lg-2 col-sm-4 col-12">
							<div class="hospital-tiles">
								<img src="img/hospital/staff.svg" alt="Top Dashboards" />
								<p>Pharmacists</p>
								<h2><?php echo $pharCount; ?></h2>
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

    $query = "SELECT * FROM appointments WHERE date = '$todayDate'";
    $sql = mysqli_query($con, $query); 
 while ($row = mysqli_fetch_array($sql)) {  
        ?>
									<div class="card" style="width: 18rem;">
										<div class="card-body">
										  <h5 class="card-title">Date: <?php echo $row["date"]; ?></h5>
										  <h6 class="card-subtitle mb-2 text-body-secondary">By :<?php echo $row["patient"] ?>
										  <?php  
                    $doctor_id = $row["doctor"];
                    $name_query = "SELECT name FROM doctors WHERE doc_id ='$doctor_id'";
                    $name_result = mysqli_query($con, $name_query);
                    $doctor_name = mysqli_fetch_assoc($name_result)["name"];
                ?> 
										 
										  To: <?php echo $doctor_name; ?></h6>
										  <p class="card-text">Sample Description about the sickness</p>
										</div>							
									  </div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
					
					<!-- Row end -->


				

				</div>
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			<footer class="main-footer">©Medi Plus Hostpitals All Rights Reserved</footer>

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