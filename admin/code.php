<?php
session_start();
require 'condb.php';

if(isset($_POST['delete_customer']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_customer'])){
    
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);

    $ctm_name = mysqli_real_escape_string($con, $_POST['ctm_name']);
    $ctm_sname = mysqli_real_escape_string($con, $_POST['ctm_sname']);
    $ctm_user = mysqli_real_escape_string($con, $_POST['ctm_user']);
    $ctm_email = mysqli_real_escape_string($con, $_POST['ctm_email']);
    $ctm_phone = mysqli_real_escape_string($con, $_POST['ctm_phone']);
    $ctm_address = mysqli_real_escape_string($con, $_POST['ctm_address']);

    $query = "UPDATE SET customer ctm_name='$ctm_name ',ctm_sname='$ctm_sname',ctm_user='$ctm_user',ctm_email='$ctm_email',ctm_phone='$ctm_phone',ctm_address='$ctm_address' WHERE id='customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message']= "เพิ่มข้อมูลสำเร็จ";
        header("Location: index1.php");
        exit(0);
    }else{
        $_SESSION['message']= "เพิ่มข้อมูลสำเร็จ";
        header("Location: index1.php");
        exit(0);
    }
}

if(isset($_POST['save_customer']))
{
    $ctm_name = ['ctm_name'];
    $ctm_sname = ['ctm_sname'];
    $ctm_user = ['ctm_user'];
    $ctm_email = ['ctm_email'];
    $ctm_phone = ['ctm_phone'];
    $ctm_address = ['ctm_address'];

    $query = "INSERT INTO customer (ctm_name,ctm_sname,ctm_user,ctm_email,ctm_phone,ctm_address) VALUES ('$ctm_name','$ctm_sname','$ctm_user','$ctm_email','$ctm_phone','$ctm_address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: index1.php");
        exit(0);
    }
}
?>