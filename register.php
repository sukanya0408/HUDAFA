<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>สมัครสมาชิก</title>
   <!-- Bootstrap CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>
  <div class="container">
<br><br>
<div class="row">
    <div class="col-md-6 bg-light text-dark" >
      <br>

<div class="alert alert-primary h4" role="alert">
สมัครสมาชิก
</div>

<form method="POST" action="insert_register.php">
ชื่อ <input type="text" name="ctm_name" class="form-control" required>
นามสกุล <input type="text" name="ctm_sname" class="form-control" required>
ชื่อผู้ใช้ <input type="text" name="ctm_user" maxlength="10" class="form-control" required>
รหัสผ่าน <input type="password" name="ctm_password" maxlength="10" class="form-control" required>
อีเมล <input type="text" name="ctm_email" class="form-control" required>
เบอร์โทรศัพท์ <input type="text" name="ctm_phone" class="form-control" required   >
ที่อยู่ <input type="text" name="ctm_address" class="form-control" required> <br>
<input type="submit" name="submit" value="ยืนยัน" class="btn btn-warning">
<input type="reset" name="cancle" value="ยกเลิก" class="btn btn-danger"> <br>
<br>
<a href="login.php"> Login </a>
</form>
</div>

</div>


</div>

</body>
</html>