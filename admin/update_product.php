<?php
include 'condb.php';
$proid= $_POST['proid'];
$proname = $_POST['pname'];
$typeid = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];
$image = $_POST['txtimg'];
 $product_best = $_POST['product_best'];
$status = 0;
if($product_best == "on"){
    $status = 1;
}
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "image/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
     $new_image_name = "$image";
    }

    $sql = "UPDATE product SET
    pro_name ='$proname', 
    type_id = '$typeid',
    price = '$price',
    amount = '$num',
    image = '$new_image_name',
    product_best = '$status'
    WHERE pro_id='$proid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_product.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>