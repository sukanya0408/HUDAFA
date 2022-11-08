<?php 
session_start();
include 'condb.php';
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
    <style type="text/css">
    html {
        height: 100%;
    }

    body {
        margin: 0px;
        height: 100%;
    }

    #map {
        width: 85%;
        height: 40%;
    }
    </style>
    <script src="https://api.longdo.com/map/?key=c6a189a4f8b88d7cee509691a363c224"></script>
    <script>
    var map;
    var marker = new longdo.Marker({
        lon: 100.643005,
        lat: 14.525007
    });

    function init() {
        map = new longdo.Map({
            placeholder: document.getElementById('map')
        });
        map.location({
            lon: 100,
            lat: 16
        }, true);
    }

    function dropMarker() {
        var result = map.location();
        console.log(result)
        alert(
            "lon: " + result.lon +
            "\nlat: " + result.lat
        )
        var _aa = new longdo.Marker({
            lon: result.lon,
            lat: result.lat
        });
        map.Overlays.drop(_aa);
    }
    </script>
</head>
<?php 
include 'navbar.php';
?>

<body onload="init();">
    <div class="container">
        <form id="form1" method="POST" action="insert_cart.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    <div class="h2 mb-4 mt-4">
                        <b> สั่งซื้อสินค้า </b>
                    </div>
                    <table class="table table-hover">
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

if(isset($_SESSION["intLine"])) {   //ถ้าว่างให้ทำงานใน {}

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){ 
    if(($_SESSION["strProductID"][$i]) != ""){
        $sql="select * from product where pro_id ='" . $_SESSION["strProductID"][$i] . "' " ;
        $result = mysqli_query($conn, $sql);
        $row_pro = mysqli_fetch_array($result);

        $_SESSION["product_id"] = $row_pro['pro_id'];
        $_SESSION["price"] = $row_pro['price'];
        $Total = $_SESSION["strQty"][$i];
        $sum = $Total * $row_pro['price'];
        $sumPrice = (float) $sumPrice + $sum;
        $_SESSION["sum_price"] = $sumPrice;
        $sumTotal=$sumTotal+ $Total;      
?>
                        <tr>
                            <td><?=$m?></td>
                            <td>
                                <img src="admin/image/<?=$row_pro['image']?>" width="150" height="100   "
                                    class="border">
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
                            <td><a href="pro_delete.php?Line=<?=$i?>"><img src="image/delete1.png" width="30"></a></td>
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
                    <p class="text-end">จำนวนสินค้าที่สั่งซื้อ <?= $sumTotal?> ชิ้น</p>
                    <div style="text-align:right">
                        <a href="show_product.php"><button type="button"
                                class="btn btn-outline-danger">เลือกสินค้า</button> </a>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div id="map" class="mt-2"></div>
                    <div class="mt-2">
                        <button onclick="dropMarker()" class="btn btn-outline-info">พิกัดปักหมุด</button>
                    </div>
                    <div class="col-md-10 mt-2">
                        <div class="alert alert-warning" h4 role="alert">
                            <b>ข้อมูลสำหรับจัดส่ง </b>
                        </div>
                        ชื่อ - นามสกุล
                        <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"
                            value="<?=$_SESSION['ctm_name']?> <?=$_SESSION['ctm_sname']?> " readonly> <br>
                        ที่อยู่จัดส่งสินค้า
                        <textarea class="form-control" required placeholder="ที่อยู่" name="cus_add" row="3"></textarea>
                        <br>
                        เบอร์โทรศัพท์
                        <input type="number" name="cus_tel" maxlength="10" class="form-control" required
                            placeholder="เบอร์โทรศัพท์"> <br>
                        อัปโหลดหลักฐานชำระเงิน
                        <input type="file" name="slip" class="form-control" required
                            placeholder="อัปโหลดหลักฐานชำระเงิน"> <br>
                        <br><br><br>
                    </div>
                    <div class="col-md-10">
                        <b>
                            <div class="alert alert-warning text-center" h4 role="alert">แสกน Qrcode เพื่อชำระเงิน
                        </b>
                        <div class="card" style="width: 18rem;">
                            <img src="image/slip.png">
                        </div>
                    </div>
                </div>
        </form>
        <div class="text-center">
            <button type="submit" class="btn btn-outline-success"
                style="margin-bottom: 20px;">ยืนยันการสั่งซื้อ</button>
        </div>
    </div>
</body>

</html>