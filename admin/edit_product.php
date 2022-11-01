<?php
include 'condb.php';
$idpro = (isset($_GET['id'])) ? $_GET['id'] : '';
$sql = "SELECT * FROM product WHERE pro_id='$idpro' ";
$result= mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$p_typeID=$rs['type_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสินค้า</title>
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
<body>
<?php include 'menu1.php'   ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<div class="card mb-4 mt-4">
<div class="card-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary  h4 text-center mb-4" role="alert">
                แก้ไขข้อมูลสินค้า
            </div>

                <form name="form1" method="post" action="update_product.php" enctype="multipart/form-data">
                <label> รหัสสินค้า</label>
                <input type="text" name="proid" class="form-control" readonly value="<?php echo $rs['pro_id']?>" >
                <label> ชื่อสินค้า</label>
                <input type="text" name="pname" class="form-control" value="<?php echo $rs['pro_name']?>" >
                
                <label> ประเภทสินค้า</label>
                <select class="form-select" name="typeID">
                   <?php
                   $sql="SELECT * FROM type ORDER BY type_name";
                   $hand=mysqli_query($conn,$sql);
                   while($row=mysqli_fetch_array($hand)){
                   $ttype_id = $row['type_id'];
                   ?>
                    <option value="<?=$row['type_id']?>" <?php if($p_typeID==$ttype_id){echo "selected=selected";} ?>>
                    <?=$row['type_name']?></option>
                    <?php
                        }
                         mysqli_close($conn);
                    ?>
                </select>
                <label> ราคา </label>
                <input type="number" name="price" class="form-control"  value="<?php echo $rs['price']?>" >
                <label class="form-check-label" for="flexSwitchCheckChecked">สินค้าขายดี</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="product_best" name="product_best" <?php if($rs['product_best'] == '1'){ echo "checked"; }?> >
                </div>
                <label> จำนวน </label>
                <input type="number" name="num" class="form-control" value="<?php echo $rs['amount']?>" > <br>
                <label> รูปภาพ </label><br><br>
                 <img src="image/<?php echo $rs['image']?>"  width="100px" height="150px" ><br><br>
                <input type="file" name="file1" > <br> <br>
                <input type="hidden" name="txtimg" class="form-control" value="<?php echo $rs['image']?>" >
                 
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a class="btn btn-danger" href="sh_product.php" role="button">ยกเลิก</a>
                </form>
            </div>
            <script src="../js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>
</html>