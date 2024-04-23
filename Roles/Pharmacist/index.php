<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mediplus Pharmacy - Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="js/index.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="./login.php" method="post" >
            <div class="logo">
        			<h1 class="logo-caption"><span class="tweak">Mediplus</span></h1>
              <h3 class="logo-caption"><span class="tweak">Pharmacy Login</span></h3>
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="username"  required>
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="password"  required>
            </div> <!-- input-group class -->
            <div class="form-group">
              <button class="btn btn-primary" name="login" >Login</button>
            </div>
            <p>Press <a href="http://localhost/mediplus/loginportal.php"><b>HERE</b></a> to go back</p>
          </form><!-- form close -->
        </div> <!-- cord-body class -->

      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
