<?php
include("./db/config.php");
session_start();
$patientname =  $_SESSION['SESSION_USERNAME'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> 
</head>
<body>

<div class="container mt-3">
  <div class="alert alert-success">
  <strong>Hello!</strong> <?php echo $patientname; ?>
</div>
  <div class="mt-4 p-5 bg-primary text-white rounded">
    <h1>Mediplus | Patient Portal</h1> 
    <p>Mediplus provides the world best online healthcare services for patients</p>
    <a class="btn btn-dark" href="patient_dashboard.php">Home</a>
    <a href="logout.php" class="btn btn-danger">Log out</a>
    <a class="btn btn-warning" href="view_lab.php">View Lab Reports</a> 
    <a class="btn btn-secondary" href="view_history.php">View Previous Appointments</a> 
  </div>
  <br>
  <?php
  include('./db/config.php');
    $query ="SELECT * FROM appointments WHERE patient ='$patientname' ";
    $sql = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($sql))
    {  ?>
  
  <div class="card">
  <div class="card-header">
    Doctor ID: <?php echo $row['doctor'] ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['date']; ?></h5>
    <p class="card-text"><?php echo $row['time_slot']; ?></p>
  </div>
</div>

<br>

<?php } ?>






</div>


</body>
</html>
