<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สมัครสมาชิก</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  require('condb.php');


  if(isset($_REQUEST['ctm_user'])){
    $ctm_name    = stripcslashes($_REQUEST['ctm_name']);
    $ctm_name = mysqli_real_escape_string($con, $ctm_name);

    $ctm_sname    = stripcslashes($_REQUEST['ctm_sname']);
    $ctm_sname = mysqli_real_escape_string($con, $ctm_sname);
    
    $ctm_user    = stripcslashes($_REQUEST['ctm_user']);
    $ctm_user = mysqli_real_escape_string($con, $ctm_user);

    $ctm_password   = stripcslashes($_REQUEST['ctm_password']);
    $ctm_password = mysqli_real_escape_string($con, $ctm_password);

    $ctm_email   = stripcslashes($_REQUEST['ctm_email']);
    $ctm_email = mysqli_real_escape_string($con, $ctm_email);

    $ctm_phone   = stripcslashes($_REQUEST['ctm_phone']);
    $ctm_phone = mysqli_real_escape_string($con, $ctm_phone);

    $ctm_address   = stripcslashes($_REQUEST['ctm_address']);
    $ctm_address = mysqli_real_escape_string($con, $ctm_address);


    $query = "INSERT INTO customer (ctm_name,ctm_sname,ctm_user,ctm_password,ctm_email,ctm_phone,)
    VALUES ($ctm_name,$ctm_sname, $ctm_user,$ctm_password,$ctm_email,$ctm_phone,$ctm_address)";

    $result = mysqli_query($con, $query);

    if($result){
      echo "<div class='form'>
      <h3> สมัครสมาชิกสำเร็จ </h3>
      <br> Click here to <a href='login.php'>Login</a>
      </div>";
    }else{
    }
  ?>
    <div class="form">
      <h1>สมัครสมาชิก</h1>
      <form name="register" action="" methode="post">
        <input type="ctm_name" name="ctm_name" placeholder="ctm_name" require>
        <input type="ctm_sname" name="ctm_sname" placeholder="ctm_sname" require>
        <input type="ctm_user" name="ctm_user" placeholder="ctm_user" require>
        <input type="ctm_password" name="ctm_password" placeholder="ctm_password" require>
        <input type="ctm_email" name="ctm_email" placeholder="ctm_email" require>
        <input type="ctm_phone" name="ctm_phone" placeholder="ctm_phone" require>
        <input type="ctm_address" name="ctm_address" placeholder="ctm_address" require>
        <input type="submit" name="submit" value="register">
      </form>
    </div>
    <?php }  ?>

</body>
</html>