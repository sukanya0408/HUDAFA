<?php
include 'condb.php';
$ctm_name = $_POST['name'];
$ctm_sname = $_POST['sname'];
$ctm_user = $_POST['username'];
$ctm_password = $_POST['password'];
$ctm_email = $_POST['email'];
$ctm_phone = $_POST['phone'];
$ctm_address =$_POST['address'];

$sql = "INSERT INTO customer(ctm_name,ctm_sname,ctm_user,ctm_password,ctm_email,ctm_phone,ctm_address) 
values('$ctm_name','$ctm_sname','$ctm_user','$ctm_password','$ctm_email','$ctm_phone','$ctm_address') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='fr_cus.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>