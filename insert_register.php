<?php
include 'condb.php';
$ctm_name = $_POST['ctm_name'];
$ctm_sname = $_POST['ctm_sname'];
$ctm_user = $_POST['ctm_user'];
$ctm_password = $_POST['ctm_password'];
$ctm_email = $_POST['ctm_email'];
$ctm_phone = $_POST['ctm_phone'];
$ctm_address = $_POST['ctm_address'];

// $ctm_password=hash('sha512',$ctm_password);

$sql = "INSERT INTO customer(ctm_name,ctm_sname,ctm_user,ctm_password,ctm_email,ctm_phone,ctm_address) 
values('$ctm_name','$ctm_sname','$ctm_user','$ctm_password','$ctm_email','$ctm_phone','$ctm_address') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('สมัครสมาชิกสำเร็จ'); </script>";
    echo "<script> window.location='register.php'; </script>";
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('สมัครสมาชิกไม่สำเร็จ'); </script>";
}
mysqli_close($conn);
?>

