<?php
include("./db/config.php");
session_start();
$patientname = $_SESSION['SESSION_USERNAME'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <div class="alert alert-success">
        <strong>Hello!</strong> <?php echo $patientname; ?>
    </div>
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Mediplus | Patient Portal</h1>
        <p>Mediplus provides the world's best online healthcare services for patients</p>
        <a class="btn btn-dark" href="patient_dashboard.php">Home</a>
        <a href="logout.php" class="btn btn-danger">Log out</a>
        <a class="btn btn-warning" href="view_lab.php">View Lab Reports</a>
        <a class="btn btn-secondary" href="view_history.php">View Previous Appointments</a>
  
    </div>
    <br>
    <div class="container mt-3">
        <h2>Book an Appointment</h2>

        <form action="appointment_booking.php" method="post">
     <div>     
    <label for="browser" class="form-label">Choose your doctor from the list:</label>
    <input class="form-control" list="doctors" name="doctor" id="doctor" required>
    <datalist id="doctors">
    <?php
															include("./db/config.php");
															$query ="SELECT * FROM doctors";
															$sql = mysqli_query($con,$query);
															while($row = mysqli_fetch_array($sql))
															{  ?>
                             <option value="<?php echo $row["doc_id"];?> - <?php echo $row["name"];?>">Speciality - <?php echo $row["speciality"] ?></option>
                        
															<?php  }  ?>
    </datalist> 
    </div>
<br>
    <div>
    <label for="birthdate">Select Appointment Date:</label>
  <input type="date" id="date" name="date" required>

    </div>
   

    <div>
    <label for="sel1" class="form-label">Select Time Slot:</label>
    <select class="form-select" id="sel1" name="timeslot" required>
      <option>1.00 - 2.00 p.m</option>
      <option>2.00 - 3.00 p.m</option>
      <option>3.00 - 4.00 p.m</option>
      <option>4.00 - 5.00 p.m</option>
    </select>

    </div>
    
    
    <button type="submit"  name="submit" class="btn btn-primary mt-3">Book</button>
  </form>

    
    
    </div>
    <br>
</div>


</body>
</html>
