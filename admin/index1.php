<?php
    require 'condb.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ข้อมูลลูกค้า</title>
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ข้อมูลลูกค้า
                            <a href="customer_creat.php" class="btn btn-primary float-end">เพิ่มข้อมูลลูกค้า</a>
                        </h4>
                    </div>
                    <div class="card body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ที่อยู่</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM customer";
                                    $query_run = mysqli_query($conn,$query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $customer){
                                        ?>
                                        <tr>
                                            <td><?=$customer['customer_id']; ?></td>
                                            <td><?=$customer['ctm_name']; ?></td>
                                            <td><?=$customer['ctm_sname']; ?></td>
                                            <td><?=$customer['ctm_user']; ?></td>
                                            <td><?=$customer['ctm_email']; ?></td>
                                            <td><?=$customer['ctm_phone']; ?></td>
                                            <td><?=$customer['ctm_address']; ?></td>
                                            <td>
                                                <a href="customer_edit.php?id=<?=$customer['customer_id']; ?>" class="btn btn-success btn-sm">แก้ไข</a>
                                                <a href="" class="btn btn-danger btn-sm">ลบ</a>
                                            </td>
                                        </tr>
                                        <?php

                                        
                                        }
                                    }else{
                                        echo "<5h> No Record Found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>