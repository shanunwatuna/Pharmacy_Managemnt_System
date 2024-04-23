<?php
include("./db/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["speciality"])) {
    $selectedSpeciality = htmlspecialchars($_POST["speciality"]);

    // Check the database connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT doc_id, name FROM doctors WHERE speciality = '$selectedSpeciality'";
    $result = $con->query($sql);

    $doctors = array();
    while ($row = $result->fetch_assoc()) {
        $doctors[] = "<option value='{$row['doc_id']}'>{$row['name']}</option>";
    }

    echo implode('', $doctors);
    $con->close();
} else {
    echo "<option value=''>Select a doctor</option>";
}
?>
