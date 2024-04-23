<?php
include('./db/config.php');
session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in
    $patientname = $_SESSION['SESSION_USERNAME'];

    // Retrieve user id from the database
    $result = $con->query("SELECT p_id FROM patients WHERE username = '$patientname'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $loggedUserId = $row['p_id'];
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




</div>

          
<?php
//database connection details

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "medi";

 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

 //Fetch the uploaded files from the database


 $current_lab = $_SESSION['SESSION_USERNAME'];
 $sql = "SELECT *FROM files WHERE p_id = '$loggedUserId' ";
 $result = $conn->query($sql);

?>




	<div class="container mt-5">
       
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
					<th>Patient ID</th>
          <th>Lab Technisian ID</th>
					<th>Doctor</th>
					<th>Report Type</th>
					<th>Comments</th>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>File Type</th>
                    <th>Download</th>
			
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the uploaded files and download links
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
							<td><?php echo $row['p_id']; ?></td>
              <td><?php echo $row['upload']; ?></td>
							<td><?php echo $row['d_id']; ?></td>
							<td><?php echo $row['type']; ?></td>
							<td><?php echo $row['comments']; ?></td>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['filesize']; ?> bytes</td>
                            <td><?php echo $row['filetype']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
				
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>
