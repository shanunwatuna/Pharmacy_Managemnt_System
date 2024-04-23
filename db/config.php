<?php
$hostname = "localhost"; //database host
$username = "root"; //database username
$password = ""; //database user password
$database = "medi"; //database name


$con = new mysqli($hostname, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

echo "<script>console.log('Connected successfully');</script>";

?>
