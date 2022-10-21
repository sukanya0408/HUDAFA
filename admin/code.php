<?php
session_start();
require 'condb.php';

if(isset($_POST['save_customer'])){
    
    $ctm_name = mysqli_real_escape_string($conn, $_POST['ctm_name']);
    $ctm_sname = mysqli_real_escape_string($conn, $_POST['ctm_sname']);
    $ctm_user = mysqli_real_escape_string($conn, $_POST['ctm_user']);
    $ctm_password = mysqli_real_escape_string($conn, $_POST['ctm_password']);
    $ctm_email = mysqli_real_escape_string($conn, $_POST['ctm_email']);
    $ctm_phone = mysqli_real_escape_string($conn, $_POST['ctm_phone']);
    $ctm_address = mysqli_real_escape_string($conn, $_POST['ctm_address']);

    $query = "INSERT INTO customer (ctm_name,ctm_sname,ctm_user,ctm_password,ctm_email,ctm_phone,ctm_address) 
    VALUES ('$ctm_name','$ctm_sname','$ctm_user','$ctm_password','$ctm_email','$ctm_phone','$ctm_address')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message']= "เพิ่มข้อมูลสำเร็จ";
        header("Location: customer_creat.php");
        exit(0);
    }else{
        $_SESSION['message']= "เพิ่มข้อมูลสำเร็จ";
        header("Location: customer_creat.php");
        exit(0);
    }
}
?>