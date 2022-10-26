<?php
session_start();
require 'condb.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>แก้ไขข้อมูลลูกค้า</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>แก้ไขข้อมูลลูกค้า
                        <a href="index1.php" class="btn btn-danger float-end">ย้อนกลับ</a> 
                    </h4>
                    </div>
                    <div class="card-body">

            <?php 
            if(isset($_GET['customer_id']))
            {
                $customer_id = mysqli_real_escape_string($con, $_GET['customer_id']);
                $query = "SELECT * FROM customer WHERE id='$customer_id' ";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    $customer = mysqli_fetch_array($query_run);
                ?>
                <form action="code.php" method="POST">
                    <input type="hidden" name="customer_id" value="<?= $customer['customer_id']; ?>" >
                
                    <div class="mb-3">
                        <label>ชื่อ</label>
                        <input type="text" name="ctm_name" value="<?= $customer['ctm_name'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>นามสกุล</label>
                        <input type="text" name="ctm_sname" value="<?= $customer['ctm_sname'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>ชื่อผู้ใช้</label>
                        <input type="text" name="ctm_user" value="<?= $customer['ctm_user'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>อีเมล</label>
                        <input type="text" name="ctm_email"  value="<?= $customer['ctm_email'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="ctm_phone"  value="<?= $customer['ctm_phone'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>ที่อยู่</label>
                        <input type="text" name="ctm_address"  value="<?= $customer['ctm_address'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_customer" class="btn btn-primary">
                            ยืนยันการแก้ไข
                        </button>
                    </div>

                        </form>
                        <?php
                    }   
                    else
                    {
                    echo "<h4>No Such Id Found</h4>";
                    }
                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>