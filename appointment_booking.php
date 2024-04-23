<?php   
  include("db/config.php");
  session_start();
$patientname = $_SESSION['SESSION_USERNAME'];
  if(isset($_POST["submit"]))
  {
      //post all value

      extract($_POST);
      $query = "INSERT INTO `appointments` (`ap_id`, `patient`, `doctor`, `date`,`time_slot`) VALUES (NULL,'".$patientname."', '".$doctor."', '".$date."','".$timeslot."');";
      mysqli_query($con,$query);
      header("Location: patient_dashboard.php");

  }

?>
