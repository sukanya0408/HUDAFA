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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="show_product.php">Juti Bakery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="show_product.php">หน้าเเรก</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">*</a></li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ประเภท</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="show_product.php">สินค้าทั้งหมด</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            ตะกร้า
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="edit_profile.php">แก้ไขโปรไฟล์</a></li>
                        <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
                </div>
            </div>
        </nav>
<body>
<main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header bg-light">
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php">
    <div class = "row">
        <div class ="col-md-10"><br>
        <h5><b>สั่งซื้อสินค้า </b></h5>
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
$Total = 0;
$sumPrice = 0;
$m = 1;
$sumTotal=0;

if(isset($_SESSION["intLine"]))  {

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
        $sumTotal=$sumTotal+$Total;
?>
        <tr>
            <td><?=$m?></td>
            <td>
                <img src="image/<?=$row_pro['image']?>" width="150" height="100" class="border">
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
}

mysqli_close($conn);
?>
<tr>
    <td class="text-end" colspan="4">รวมเป็นเงิน</td>
    <td class="text-center"><?=number_format($sumPrice,2)?></td>
    <td>บาท</td>
</tr>
</table>
<p class="text-end">จำนวนสินค้าที่สั่งซื้อ <?= $sumTotal?> ชิ้น </p>
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
            <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล" > <br>
            ที่อยู่จัดส่งสินค้า
           <textarea class="form-control" required placeholder="ที่อยู่" name="cus_add" row="3"></textarea> <br>
            เบอร์โทรศัพท์
            <input type="number" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์"> <br>
            <input type="file" name="slip" class="form-control" required placeholder="อัปโหลดหลักฐานชำระเงิน"> <br>
            <br><br><br>
        </div>
    </div>
</form>
</div>
</body>
</html>