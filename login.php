<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 badge bg-light text-dark ">
     <h5> Login </h5>
     <form method="POST" action="login_check.php">
<input type="text" name="ctm_user" class="form-control" required placeholder="username"> <br>
<input type="password" name="ctm_password" class="form-control" required placeholder="password"> <br>
<?php
    if(isset($_SESSION["Error"])){
        echo "<div class = 'text-danger'>";
        echo $_SESSION["Error"];
    }
?>
<input type="submit" name="submit" value="Login" class="btn btn-warning">
</form>
    </div>

  </div>
  <a href="register.php"> Register </a>
</div>

</body>
</html>