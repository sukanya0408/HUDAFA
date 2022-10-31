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
<div class="card-header">
    <div class = "container">
        <div class = "row">
        <?php
            $ids=$_GET['id'];
            $sql = "SELECT * FROM product,type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);
        ?>
        
            <div class = "col-md-4">
                <img src="image/<?=$row['image']?>" width="300px" height="250" class="mt-2 p-2 my-2 border" />
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