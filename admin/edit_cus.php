<?php
include 'condb.php';
$cusid = (isset($_GET['id'])) ? $_GET['id'] : '';
$sql = "SELECT * FROM customer WHERE customer_id='$cusid' ";
$result= mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลลูกค้า</title>
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
            แก้ไขข้อมูลลูกค้า
            </div>

                <form name="form1" method="post" action="update_cus.php" enctype="multipart/form-data">
                <label> รหัสลูกค้า</label>
                <input type="text" name="cusid" class="form-control" readonly value="<?php echo $rs['customer_id']?>" >
                <label> ชื่อ</label>
                <input type="text" name="name" class="form-control" value="<?php echo $rs['ctm_name']?>" >
                <label> นามสกุล </label>
                <input type="text" name="sname" class="form-control"  value="<?php echo $rs['price']?>" > <br>
                <label> ชื่อผู้ใช้ </label>
                <input type="number" name="num" class="form-control" value="<?php echo $rs['amount']?>" > <br>
        
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a class="btn btn-danger" href="sh_product.php" role="button">ยกเลิก</a>
                </form>
            </div>



        </div>
    </div>
</body>
</html>