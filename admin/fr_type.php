<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มประเภทสินค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary  h4 text-center mb-4" role="alert">
            เพิ่มประเภทสินค้า
            </div>
                <form name="form1" method="post" action="insert_cus.php" enctype="multipart/form-data">
                <label> ชื่อประเภท</label>
                <input type="text" name="type" class="form-control" required><br>

                <button type="submit" class="btn btn-success">บันทึก</button>
                <a class="btn btn-danger" href="#" role="button">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>