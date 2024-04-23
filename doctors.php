


<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Meta Tags -->
      <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Mediplus - Medicare Center</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
        
</head>
<body>
  

	
	
		<!-- Header Area -->
		<header class="header" >
			
	
			
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="img/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li ><a href="index.php">Home </a>
										
											</li>
											<li class="active"><a href="doctors.php">Doctors</a></li>
										
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>

							
							<div class="col-lg-2 col-12 ">
								<div class="get-quote">
										<div class="container mt-3">
									<a href="loginportal.php" class="btn">Login to Portal</a>
									</div>
									
								</div>
							</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		

    <div class="jumbotron">
  <h1 class="display-5">Find your Consultant!</h1>
  <hr class="my-4">


</div>

<div class="container mt-3>">



					<!-- Row start -->
	
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
        	    include("./db/config.php");
                $query ="SELECT * FROM doctors";
                $sql = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($sql))
                {  ?>
                    <div class="col">
        <div class="card h-100">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
          <div class="card-body">
            <h5 class="card-title">Dr. <?php echo $row["name"];?></h5>
            <p class="card-text"><?php echo $row["speciality"];?></p>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary"><?php echo $row["qualification"];?></small>
          </div>
        </div>
        </div>
					<?php }  ?>
					<!-- Row end -->
                    

                    </div>
</div>

</body>
</html>
