<?php
include 'condb.php';
session_start();

$ctm_user = $_POST['ctm_user'];
$ctm_password = $_POST['ctm_password'];

$ctm_password=hash('sha512',$ctm_password);

$sql="SELECT * FROM customer WHERE ctm_user='$ctm_user' and ctm_password='$ctm_password' ";
$result=mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);

if($row > 0){
    $_SESSION["ctm_user"]=$row['ctm_user'];
    $_SESSION["ctm_password"]=$row['ctm_password'];
    $_SESSION["ctm_name"]=$row['ctm_name'];
    $_SESSION["ctm_sname"]=$row['ctm_sname'];
    $show=header("location:show_product.php");
}else{
    $_SESSION["Error"] = "<p> Your user or password is invalid </p>";
    $show=header("location:login.php");
}
    echo $show;

?>