<?php 
    include 'condb.php';
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:logout.php");
    }
?>
<?php include 'condb.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>หน้าสินค้า</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<header class="bg-light py-3">
            <div class="secondary px-4 px-lg-1 my-2">
                <div class="text-center text-dark">
                    <h1 class="display-4 fw-bolder">Juti Bakery</h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                    <img class="img-fluid" src="image/donut.jpg" alt="..." />
                </div>
            </div>
        </header>
        <?php 
        include 'navbar.php';
        ?>
<body>
<div class = "container">
        <div class = "row">
            <?php
            $sql = "SELECT * FROM product WHERE amount > 0 ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){
            ?>
            <div class = "col-sm-3">
                <div class="text-center">
                <img src="admin/image/<?=$row['image']?>" width="300px" height="250" class="mt-5 p-2 my-2 border"> <br>
                ID : <?=$row['pro_id']?><br>
                <b class = "text-success"><?=$row['pro_name']?></b><br>
                ราคา <b class="text-danger"> <?=$row['price']?> </b> บาท <br>
                <a class = "btn btn-outline-success mt-4" href="sh_product_detail.php?id=<?=$row['pro_id']?>">รายละเอียด</a>
                </div>
                <br>
            </div>
            <?php
            } 
            mysqli_close($conn)
            ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>