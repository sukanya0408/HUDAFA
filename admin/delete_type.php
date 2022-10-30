<?php
include 'condb.php';
$id = $_GET['id'];

$sql = "DELETE FROM type WHERE type_id = '$id'";

$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    echo "<script> alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_type.php';</script>";
}else{
    echo "<script> alert('ลบข้อมูลไม่สำเร็จ'); </script>";
}

?>