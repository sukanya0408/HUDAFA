<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลประเภทสินค้า</title>
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
<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
    <div class="container">
    <div class="h2 mb-4 mt-4">
    <b> ข้อมูลประเภทสินค้า </b>
            </div>
            <a class="btn btn-primary mb-4" href="fr_type.php" role="button">ประเภทสินค้า+</a> <br>
            <table id="datatablesSimple" class="table table-striped"> 
           <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อประเภท</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
           </tr> 
<?php
$sql="SELECT * FROM type WHERE type_id ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
?>
           <tr>
            <td><?=$row['type_id']?></td>
            <td><?=$row['type_name']?></td>
            <td><a href="edit_type.php?id=<?=$row['type_id']?>" class="btn btn-success">แก้ไข</a></td>
            <td><a href="delete_type.php?id=<?=$row['type_id']?>" class="btn btn-danger">ลบ</a></td>
        
           </tr>
           <?php
           }
           mysqli_close($conn);
           ?>
        </table>
    </div>
                <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>