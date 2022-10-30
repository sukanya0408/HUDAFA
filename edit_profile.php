<?php
session_start();
include('condb.php');
if (isset($_POST['edit_profile'])) {
    $customer_id = $_POST['customer_id'];
    $ctm_name = $_POST['ctm_name'];
    $ctm_sname = $_POST['ctm_sname'];
    $ctm_address = $_POST['ctm_address'];
    $ctm_email = $_POST['ctm_email'];
    $ctm_phone = $_POST['ctm_phone'];
    $ctm_user = $_POST['ctm_user'];
    $ctm_password = $_POST['ctm_password'];
  
        try {
            $ctm_password = password_hash($ctm_password, PASSWORD_DEFAULT);
            $query = "UPDATE customer SET ctm_name = :ctm_name, ctm_sname = :ctm_sname, ctm_address = :ctm_address, ctm_email = :ctm_email, ctm_phone = :ctm_phone, ctm_user = :ctm_user, ctm_password = :ctm_password WHERE customer_id = :customer_id";
            $stmt = $conn->prepare($query);
        $data = [
            ':customer_id' => $customer_id,
            ':ctm_name' => $ctm_name,
            ':ctm_sname' => $ctm_sname,
            ':ctm_address' => $ctm_address,
            ':ctm_email' => $ctm_email,
            ':ctm_phone' => $ctm_phone,
            ':customer_id' => $customer_id,
            ':ctm_user' => $ctm_user,
            ':ctm_password' => $ctm_password
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: profile.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: profile.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>