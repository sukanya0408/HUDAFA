<!DOCTYPE html>
<html lang="en">

<head>

    <title>เข้าสู่ระบบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sheet.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>

    <div class="login">

        <h1 class="text-center">Login</h1>

        <form class="needs-validation" action="login_amcheck.php" method="POST">
            <div class="form-group was-validated">
                <label class="form-label text-success" for="username">Username</label>
                <input class="form-control" type="type" name="admin_username" required>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label text-success" for="password">Password</label>
                <input class="form-control" type="password" name="admin_password" id="myPassword" required>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox" onclick="passShow()">
                <label>แสดงรหัสผ่าน</label>
            </div>
            <div>
                <input class="btn btn-success w-100" type="submit" name="login" value="เข้าสู่ระบบ">
            </div>
        </form>

    </div>

</body>

</html>