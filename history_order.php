<?php 
    include 'condb.php';
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:logout.php");
    }else{
        $cus_id = $_SESSION['userid'];
        $sql = "SELECT * FROM `tb_order` JOIN order_detail ON order_detail.orderID = tb_order.orderID JOIN product ON product.pro_id = order_detail.pro_id WHERE tb_order.`cus_id` = $cus_id ORDER BY tb_order.`orderID` DESC";
        $result = mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ประวัติการสั่งซื้อ</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<?php
include 'navbar.php';
?>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-12">
                <div class="card" >
                    <div class="card-header">
                        ประวัติการสั่งซื้อ
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php while($row=mysqli_fetch_array($result)){ ?>
                                <div class="col-6 col-lg-3 card">
                                    <div class="row">
                                        <div class="col-12" style="text-align: center;padding-top: 10px;padding: 0px;">
                                            <img src="admin/image/<?=$row['image']?>" alt="" style="width: 100%;height: 100%;">
                                        </div>
                                        <div class="col-12" style="position: absolute;bottom: 15px;">
                                            <div class="card" style="background-color: #ffffff2e;">
                                                <span style="font-weight: bold;color: #fff;">ชื่อสินค้า : <span><?=$row['pro_name']?></span></span><br>
                                                <span style="font-weight: bold;color: #fff;">จำนวน : <span><?=$row['orderQty']?></span></span><br>
                                                <span style="font-weight: bold;color: #fff;">ราคา : <span><?=$row['Total']?></span></span><br>
                                                <?php 
                                                    if($row['order_status'] == 0){
                                                        echo "<span style='background-color: #ff0000;padding: 5px 10px 5px 10px;text-align: center;color: #fff;'>ยกเลิก</span>";
                                                    }elseif($row['order_status'] == 1){
                                                        echo "<span style='background-color: #ffc107;padding: 5px 10px 5px 10px;text-align: center;color: #000;'>ยังไม่ชำระเงิน</span>";
                                                    }else{
                                                        echo "<span style='background-color: #4cff00;padding: 5px 10px 5px 10px;text-align: center;color: #000;'>ชำระเงินแล้ว</span>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>