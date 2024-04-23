<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proceed'])) {
    // Get the selected user role
    $selectedRole = $_POST['user_role'];

    // Define folder directories for each role
    $roleDirectories = [
        'Admin' => './Roles/Admin',
        'Doctor' => './Roles/Doctor',
        'Lab Technical' => './Roles/Lab',
        'Pharmacist' => './Roles/Pharmacist',
    ];

    // Check if the selected role exists in the array
    if (array_key_exists($selectedRole, $roleDirectories)) {
      // Access the folder directory for the selected role
      $folderDirectory = $roleDirectories[$selectedRole];

      // Call the heading function with the folder directory
      header("Location:$folderDirectory ");

    } else {
        // Handle invalid role selection
        echo "Invalid user role selected";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicare Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">

  <h2>Please Select the User Role</h2>
  <div class="card">
  <form action="" method="post">
    <div class="card-body">
  <div class="dropdown">
    <br>
  <select name="user_role" class="form-select form-select-lg">
    <option>Admin</option>
     <option>Doctor</option>
     <option>Lab Technical</option>
     <option>Pharmacist</option>
   </select>
</div>
    <div class="mb-3 mt-3">
    <button type="submit" name="proceed" class="btn btn-primary">Proceed</button>
    </div>
    </div>
  </form>
</div>

</div>

</body>
</html>



