<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลลูกค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'menu1.php'   ?>
    <div class="container">
    <div class="alert alert-primary  h2 text-center mb-4 mt-4" role="alert">
    แสดงข้อมูลลูกค้า
            </div>
            <a class="btn btn-primary mb-4" href="fr_cus.php" role="button">เพิ่มข้อมูลลูกค้า+</a> <br>
    <table class="table table-striped table-hover">
           <tr>
            <th>รหัสลูกค้า</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ชื่อผู้ใช้</th>
            <!-- <th>รหัสผ่าน</th> -->
            <th>อีเมล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>ที่อยู่</th>
            <th>แก้ไข</th>
           </tr> 
           
<?php
$sql="SELECT * FROM customer WHERE customer_id ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
?>
           <tr>
            <td><?=$row['customer_id']?></td>
            <td><?=$row['ctm_name']?></td>
            <td><?=$row['ctm_sname']?></td>
            <td><?=$row['ctm_user']?></td>
            <!-- <td><?=$row['ctm_password']?></td> -->
            <td><?=$row['ctm_email']?></td>
            <td><?=$row['ctm_phone']?></td>
            <td><?=$row['ctm_address']?></td>
            <td><a href="edit_cus.php?id=<?=$row['customer_id']?>" class="btn btn-success"> Edit</a></td>
           </tr>
           <?php
           }
           mysqli_close($conn);
           ?>
        </table>
        
    </div>
    
</body>
</html>
