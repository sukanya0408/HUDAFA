<script src = "js/jquery-3.6.1.js"></script>
<script src = "js/sweetalert2.all.min.js"></script>
<?php
session_start();
include('condb.php');

if (isset($_POST['login'])) {
    $ctm_user = $_POST['ctm_user'];
    $ctm_password = $_POST['ctm_password'];
}
if (empty($ctm_user) || empty($ctm_password)) {
    echo"<script>
    $(document).ready(function(){
        Swal.fire({
            title:'worning',
            text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        });
    });
    </script>";
    header('refresh:1; url = login.php');
    exit(0);
} else {
    $select_stmt = $conn->prepare("SELECT COUNT(ctm_user) AS count_user, ctm_password FROM customer WHERE ctm_user = :ctm_user");
    $select_stmt->bindParam(':ctm_user', $ctm_user);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['count_user'] == 0) {
        echo"<script>
        $(document).ready(function(){
            Swal.fire({
                title:'worning',
                text: 'ชื่อผู้ใช้นี้ไม่มีในระบบ',
                icon: 'warning',
                showConfirmButton: false,
                timer: 1500
            });
        });
        </script>";
        header('refresh:1; url = login.php');
        exit(0);
    } else {
        if (password_verify($ctm_password, $row['ctm_password'])) {
            $_SESSION['ctm_user'] = $ctm_user;
            $_SESSION['is_login'] = true;
            echo"<script>
            $(document).ready(function(){
                Swal.fire({
                    title:'success',
                    text: 'เข้าสู่ระบบสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
            </script>";
            header('refresh:1; url = show_product.php');
            exit(0);
        } else {
            echo"<script>
            $(document).ready(function(){
                Swal.fire({
                    title:'worning',
                    text: 'รหัสผ่านไม่ถูกต้อง',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
            </script>";
            header('refresh:1; url = login.php');
            exit(0);
        }
    }
}