<?php
include 'condb.php';
$typeid= $_POST['typeid'];
$typename = $_POST['typename'];

    $sql = "UPDATE type SET
    type_id  ='$typeid', 
    type_name = '$typename'
    WHERE type_id='$typeid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_type.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>