<?php
include 'condb.php';
$cusid= $_POST['cusid'];
$name = $_POST['name'];
$sname = $_POST['sname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

    $sql = "UPDATE customer SET
    customer_id  ='$cusid', 
    ctm_name = '$name',
    ctm_sname = '$sname',
    ctm_user	 = '$username',
    ctm_password = ' $password',
    ctm_email = ' $email',
    ctm_phone = ' $phone',
    ctm_address = ' $address'
    WHERE customer_id='$cusid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_cus.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>