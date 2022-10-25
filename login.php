<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <?php
    require ('condb.php');
    session_start();

    if(isset($_POST['ctm_name'])){

        $ctm_user = stripslashes($_REQUEST['ctm_user']);
        $ctm_user = mysqli_real_escape_string($con, $ctm_user);

        $ctm_password = stripslashes($_REQUEST['ctm_password']);
        $ctm_password = mysqli_real_escape_string($con, $ctm_password);


        $query = "SELECT * FROM customer WHERE ctm_user='$ctm_user' AND password='".md5($ctm_password)."'";


        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if($row == 1){
            $_SESSION['ctm_user'] = $ctm_user;
            header("Location: show_product.php");
        }else{
            echo "
            <div class='form'>
            <h3>Username</h3>
            <br> Click <a href='login.php'>Login</a>
            </div> ";
        }
    }else{
?>

        <div class="form">
            <h1>Login</h1>
            <form action="" method="post" name="login">
            <input type="text" name="ctm_user" placeholder="ctm_user" require>
            <input type="text" name="ctm_password" placeholder="ctm_password" require>
            </form>
        </div>
            <p>Not register yet? <a href="register.php"></a></p>
        <?php } ?>
</body>
</html>