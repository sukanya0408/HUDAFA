<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>เพิ่มข้อมูลลูกค้า</title>
  </head>
  <body>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>เพิ่มข้อมูลลูกค้า
                        <a href="index1.php" class="btn btn-danger float-end">ย้อนกลับ</a> 
                         </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                    <div class="mb-3">
                        <label>ชื่อ</label>
                        <input type="text" name="ctm_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>นามสกุล</label>
                        <input type="text" name="ctm_sname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>ชื่อผู้ใช้</label>
                        <input type="text" name="ctm_user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>อีเมล</label>
                        <input type="text" name="ctm_email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="ctm_phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>ที่อยู่</label>
                        <input type="text" name="ctm_address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save_customer" class="btn btn-primary">ตกลง</button>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>