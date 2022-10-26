<?php 
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>รายละเอียดสินค้า</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body>
    <div class = "container">
        <div class = "row">
        <?php
            $ids=$_GET['id'];
            $sql = "SELECT * FROM product,type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);
        ?>
            <div class = "col-md-4">
                <img src="img/<?=$row['image']?>" width="300px" height="250" class="mt-2 p-2 my-2 border" />
            </div>
            <div class = "col-md-6">
            ID : <?=$row['pro_id']?> <br>
            <b class = "text-success"><?=$row['pro_name']?></b> <br>
            ประเภทสินค้า : <?=$row['type_name']?> <br>
            ราคา : <b class = "text-danger"><?=$row['price']?></b> บาท <br>
            <a class = "btn btn-outline-success mt-4" href="order.php?id=<?=$row['pro_id']?>">เพิ่มในตะกร้า</a>
            </div>     
        </div>
        <?php
        mysqli_close($conn);
        ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>