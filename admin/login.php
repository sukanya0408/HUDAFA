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
	<link href="css/login.css" rel="stylesheet">
    <script src="js/sheet.js"></script>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <h1>เข้าสู่ระบบ</h1>
        <form action="login_db.php" method="POST">
             <p>ชื่อผู้ใช้</p>
             <input type="text" name="ctm_user" />
             <p>รหัสผ่าน</p>
             <input type="password" name="ctm_password" id = "myPassword"/>
             <div class="form-group mb-3">
                <input type="checkbox" onclick="passShow()">
                <label>แสดงรหัสผ่าน</label>
            </div>
             <center>
             <button type="submit" name="login">เข้าสู่ระบบ</button> 
             <br>
             <a href="register.php"><p class="small">สมัครสมาชิกผู้ใช้ใหม่</p></a>
            </center>
    </br>
        </form>
    </div>
</html>