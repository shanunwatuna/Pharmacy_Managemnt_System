<?php
include("./db/config.php");
session_start();


// Unset and destroy the session
session_unset();
session_destroy();

// Redirect to the login page
header("Location: ./login.php");
?>
