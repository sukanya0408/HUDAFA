<?php
include 'condb.php';
session_start();

$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];

$sql = "SELECT * FROM admin where admin_username='$admin_username' and admin_password='$admin_password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row > 0) {
    $_SESSION["admin_username"] = $row['admin_username'];
    $_SESSION["admin_password"] = $row['admin_password'];
    header("location:index.php");
} else {
    header("location:login_am.php");
}
?>