<?php
session_start();
include 'condb.php';
// if(!isset($_SESSION["admin_id"])){
//     $show=header("location:login.php")
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>juti Bakery</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include 'navbar.php'  ?>
    <main>
        <div class="container-fluid px-4"><br><br>
            <h4 class="alert alert-danger"> รายการสินค้าที่เหลือน้อยกว่า 10 ชิ้น</h4>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>รูปภาพ</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ประเภทสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>เพิ่มสต็อกสินค้า</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>pro_id</th>
                                <th>pro_name</th>
                                <th>type_name</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
    $sql="SELECT * FROM product p, type t WHERE p.type_id=t.type_id and amount < 10";
    $hand=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){

?>
                            <tr>
                                <td><img src="../image/<?=$row['image']?>" width="150" height="100"></td>
                                <td><?=$row['pro_id']?></td>
                                <td><?=$row['pro_name']?></td>
                                <td><?=$row['type_name']?></td>
                                <td><?=$row['price']?></td>
                                <td><?=$row['amount']?></td>

                                <td><a href="addStock.php?id=<?=$row['pro_id']?>" class="btn btn-warning">เพิ่ม</a>
                            </tr>

                            </tr>
                            <?php
    }
    mysqli_close($conn);
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'   ?>
    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>