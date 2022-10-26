<!DOCTYPE html>
<html lang="en">

<head>

    <title>สมัครสมาชิก</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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

        <h1 class="text-center">สร้างบัญชี</h1>

        <form class="needs-validation" action="insert_register.php" method="POST">
            <div class="form-group was-validated">
                <label class="form-label text-success">ชื่อ</label>
                <input class="form-control" type="text" name="ctm_name" required>
                <div class="invalid-feedback">
            </div>
            <div class="form-group was-validated">
                <label class="form-label text-success">นามสกุล</label>
                <input class="form-control" type="text" name="ctm_sname" required>
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label text-success">อีเมล</label>
                <input class="form-control" type="email" name="ctm_email" required>
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label text-success">เบอร์โทร</label>
                <input class="form-control" type="text" name="ctm_phone" required>
                <div class="invalid-feedback">

                </div>
                <div class="form-group was-validated">
                    <label class="form-label text-success">ที่อยู่</label>
                    <input class="form-control" type="text" name="ctm_address" required>
                    <div class="invalid-feedback">

                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label text-success">รหัสผ่าน</label>
                        <input class="form-control" type="password" name="ctm_password" id="myPassword" required>
                        <div class="invalid-feedback">

                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="passShow()">
                            <label>แสดงรหัสผ่าน</label>
                        </div>
                        <input class="btn btn-success w-100" type="submit" value="สมัครสมาชิก">
                        <div class="mt-2">
                            <a href="login.php" class="btn btn-primary w-100">เข้าสู่ระบบ</a>
                        </div>
        </form>

    </div>

    <script src="js/sheet.js"></script>

</body>

</html>