<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" href="../images/logo.png">

    <title>Authentication</title>
</head>

<body>

    <h1 class="header"><i class="fab fa-battle-net"></i> Algo Visualization</h1>
    <div class="hero">
        <div class="form-box">

            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>

            <form action="authentication.php" class="input-group" id="login" method="POST">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <button class="submit-btn" type="submit" name="login">Login</button>
                <br>
                <a href="#" class="link">Forgot Password ?</a>
            </form>

            <form action="authentication.php" class="input-group" id="register" method="POST">
                <input type="text" name="name" class="input-field" placeholder="Name" required>
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <button class="submit-btn" type="submit" name="register">Register</button>
            </form>
        </div>
    </div>


    <script>
        var loginForm = document.getElementById("login")
        var registerForm = document.getElementById("register")
        var shiftBtn = document.getElementById("btn")

        function register() {
            loginForm.style.left = "-400px";
            registerForm.style.left = "50px";
            shiftBtn.style.left = "110px";
        }

        function login() {
            loginForm.style.left = "50px";
            registerForm.style.left = "450px";
            shiftBtn.style.left = "0";
        }
    </script>
</body>

</html>

<?php

include("../config/db.php");

session_start();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";

    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    $query = "select * from auth where email = '$email' and password = '$encryption'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('authentication.php','_self')</script>";
    }
    while ($row = mysqli_fetch_array($run_query)) {
        $id = $row['user_id'];
        $name = $row['name'];
    }

    $_SESSION['user_id'] = $id;
    $_SESSION['name'] = $name;
    echo "<script>window.open('index.php','_self')</script>";
}

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";

    $encryption = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    $query = "insert into auth (name,email,password) values ('$name','$email','$encryption')";
    $run_register_query = mysqli_query($con, $query);

    if ($run_register_query) {
        echo "<script>alert('SucessFully Registered');</script>";
        echo "<script>window.open('authentication.php','_self')</script>";
    } else {
        echo "<script>alert('Server Error Please Try Again Later !');</script>";
    }
}
?>