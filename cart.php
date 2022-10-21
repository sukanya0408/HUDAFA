<?php 
session_start();
include 'condb.php';
// $id=$_GET["id"];
// $sql ="SELECT * FROM product WHERE pro_id ='$id' ";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
    <div class = "row">
        <div class ="col-md-10">
<div class="alert alert-warning h4" role="alert">
    สั่งซื้อสินค้า
</div>
        <table class = "table table-hover">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวนสินค้า</th>
            <th>ราคารวม</th>
            <th>เพิ่ม - ลด</th>
            <th>ลบ</th>
        </tr>
<?php
// echo "NOOOOOOOOOOO!!!!!"; 
$Total = 0;
$sumPrice = 0;
$m = 1;
for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){ 
    if(($_SESSION["strProductID"][$i]) != ""){
        $sql="select * from product where pro_id ='" . $_SESSION["strProductID"][$i] . "' " ;
        $result = mysqli_query($conn, $sql);
        $row_pro = mysqli_fetch_array($result);

        $_SESSION["price"] = $row_pro['price'];
        $Total = $_SESSION["strQty"][$i];
        $sum = $Total * $row_pro['price'];
        $sumPrice = (float) $sumPrice + $sum;
        $_SESSION["sum_price"] = $sumPrice;      
?>
        <tr>
            <td><?=$m?></td>
            <td>
                <img src="img/<?=$row_pro['image']?>" width="100" height="80" class="border">
                <?=$row_pro['pro_name']?>
            </td>
            <td><?=$row_pro['price']?></td>
            <td><?=$_SESSION["strQty"][$i]?></td>
            <td><?=number_format($sum,2)?></td>
            <td>
                <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-warning">+</a>
                <?php if($_SESSION["strQty"][$i] > 1){ ?>
                <a href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-warning">-</a>
                <?php } ?>


            </td>
            <td><a href="pro_delete.php?Line=<?=$i?>" ><img src="img/delete1.png" width="30" ></a></td>
        </tr>
<?php 
 $m=$m+1;
}
}
mysqli_close($conn);
?>
<tr>
    <td class="text-end" colspan="4">รวมเป็นเงิน</td>
    <td class="text-center"><?=number_format($sumPrice,2)?></td>
    <td>บาท</td>
</tr>
</table>
<div style="text-align:right">
<a href ="show_product.php"><button type="button" class="btn btn-outline-danger">เลือกสินค้า</button> </a>
<button type="submit" class="btn btn-outline-success">ยืนยันการสั่งซื้อ</button>
</div>
</div>
<br>
    <div class="row">
        <div class="col-md-6">
        <div class="alert alert-warning" h4 role="alert">
ข้อมูลสำหรับจัดส่ง 
            </div>
            ชื่อ - นามสกุล
            <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"> <br>
            ที่อยู่จัดส่งสินค้า
           <textarea class="form-control" required placeholder="ที่อยู่" name="cus_add" row="3"></textarea> <br>
            เบอร์โทรศัพท์
            <input type="number" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์"> <br>
            <br><br><br>
        </div>
    </div>
</form>
</div>
</body>
</html>