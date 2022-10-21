<?php 
session_start();
include 'condb.php';
$sql ="SELECT * FROM tb_order WHERE orderID = '" . $_SESSION["order_id"] . "'";
$result = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-10">
    <div class="alert alert-primary h4 text-center mt-4" role="alert">
  การสั่งซื้อเสร็จสมบูรณ์
</div>
<br>
เลขที่การสั่งซื้อ : <?=$rs['orderID']?> <br>
ชื่อ - นามสกุล (ลูกค้า): <?=$rs['cus_name']?> <br>
ที่อยู่จัดส่ง : <?=$rs['address']?> <br>
เบอร์โทรศัพท์ : <?=$rs['telephone']?> <br>
<br>
<div class="card mb-4 mt-4"> 
  <div class="card-body"> 
<table class="table table-hover">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ราคา</th>  
      <th>จำนวนที่สั่ง</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
<?php 
$sql1 ="select * from order_detail d,product p where d.pro_id=p.pro_id and orderID= '" .$_SESSION["order_id"]. "'";
$result1 = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result1)){



?>

    <tr>
      <td><?=$row['pro_id']?></td>
      <td><?=$row['pro_name']?></td>
      <td><?=$row['orderPrice']?></td>
      <td><?=$row['orderQty']?></td>
      <td><?=$row['Total']?></td>
    </tr>
  </tbody>
<?php
}
?>
</table>

<h6 class = "text-end">รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h6>
    </div>
  </div>  
<br></br>
<div class="text-center">
<a href="show_product.php" class="btn btn-success">Back</a>  
<button onclick="window.print()" class="btn btn-warning">Print</button>  
  
</div>
  </div>
</div>
</body>
</html>