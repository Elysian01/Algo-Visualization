<?php

include("../config/db.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" href="../images/logo.png">
    <title>Forgot Password</title>
</head>

<body>

    <h1 class="header"><i class="fab fa-battle-net"></i> Algo Visualization</h1>
    <div class="hero">
        <div class="mail-box ">

            <form action="forgot_password.php" method="POST">
                <h3>Please Enter Your New Password </h3>
                <br>
                <input type="password" name="password" class="input-field" placeholder="New Password" required>
                <input type="password" name="confirm_password" class="input-field" placeholder="New Confirm password" required>
                <button class="submit-btn" name="reset">Reset Password</button>
                <br>
            </form>

        </div>
    </div>


</body>

</html>


<?php
if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}
if (isset($_POST['reset']) && isset($_SESSION['id'])) {

    $id = $_SESSION['id'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);



    if ($password == $confirm_password) {

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '2345678910111211';
        $encryption_key = "DE";

        $encrypted_password = openssl_encrypt(
            $password,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        $query = "Update auth set password='$encrypted_password' where user_id= $id";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            echo "<script>window.alert('Password Updated Successfully')</script>";
            echo "<script>window.open('authentication.php','_self')</script>";
        } else {
            echo "<script>window.alert('Sorry, Please try again later password not updated')</script>";
            echo $query;
        }
    } else {
        echo "<script>window.alert('Please type password and confirm password same')</script>";
    }
}




?>