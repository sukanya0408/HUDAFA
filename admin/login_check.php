<?php
include 'condb.php';
session_start();

$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];

$admin_password=hash('sha512',$admin_password);

$sql="SELECT * FROM admin WHERE admin_username='$admin_username' and admin_password='$admin_password' ";
$result=mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);

if($row > 0){
    $_SESSION["admin_username"]=$row['admin_username'];
    $_SESSION["admin_password"]=$row['admin_password'];
    $show=header("location:index.php");
}else{
    $_SESSION["Error"] = "<p> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง </p>";
    $show=header("location:login.php");
}
    echo $show;

?>