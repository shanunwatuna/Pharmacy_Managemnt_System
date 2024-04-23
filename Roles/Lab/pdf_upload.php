<?php
session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in
    $username = $_SESSION['SESSION_USERNAME'];

    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "medi";

    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user id from the database
    $result = $con->query("SELECT l_id FROM lab_technisian WHERE l_username = '$username'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $loggedUserId = $row['l_id'];
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


<?php
   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upload = $loggedUserId;
    $patient = $_POST["patient"];
    $doctor = $_POST["doctor"];
    $type = $_POST["type"];
    $comment = $_POST["comment"];

        
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File upload success, now store information in the database
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                // Database connection
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "medi";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert the file information into the database
                $sql = "INSERT INTO files (r_id,p_id,upload,d_id,type,comments,filename, filesize, filetype) VALUES (Null,'$patient','$upload','$doctor','$type','$comment','$filename', $filesize, '$filetype')";

                if ($conn->query($sql) === TRUE) {
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                    header("Location: index.php");
                
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

