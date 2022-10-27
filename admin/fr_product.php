<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary  h4 text-center mb-4" role="alert">
                เพิ่มข้อมูลสินค้า
            </div>
                <form name="form1" method="post" action="insert_product.php" enctype="multipart/form-data">
                <label> ชื่อสินค้า</label>
                <input type="text" name="pname" class="form-control" placeholder="ชื่อสินค้า..." required>
                
                <label> ประเภทสินค้า</label>
                <select class="form-select" name="typeID">
                   <?php
                   $sql="SELECT * FROM type ORDER BY type_name";
                   $hand=mysqli_query($conn,$sql);
                   while($row=mysqli_fetch_array($hand)){
                   ?>
                    <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
                    <?php
                        }
                         mysqli_close($conn);
                    ?>
                </select>
                <label> ราคา </label>
                <input type="number" name="price" class="form-control" placeholder="ราคา..." required> <br>
                <label> จำนวน </label>
                <input type="number" name="num" class="form-control" placeholder="จำนวน..." required> <br>
                <label> รูปภาพ </label>
                <input type="file" name="file1" required> <br> <br>

                <button type="submit" class="btn btn-success">บันทึก</button>
                <a class="btn btn-danger" href="sh_product.php" role="button">ยกเลิก</a>
                </form>
            </div>



        </div>
    </div>
</body>
</html>