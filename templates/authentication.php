<?php

include("../config/db.php");

session_start();

?>


<!-- Google Login -->

<?php

include('google_config.php');

$login_button = '';


if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION["email"] = $data['email'];
        }
    }
}


if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '" style = "border: none;color: #fff;padding: 15px 15px;border-radius: 4px;background-color: #fe4a49;text-decoration:none;" >Login With Google</a>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" href="../images/logo.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

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

                <div>


                    <?php

                    if ($login_button == '') {
                        // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                        // echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                        // echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                        // echo '<h3><a href="logout.php">Logout</h3></div>';
                        $_SESSION['name'] = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                        echo "<script>window.open('index.php','_self')</script>";
                    } else {
                        echo '<br><div align="center" style="display:block;position:absolute;margin:7px;margin-left:80px;">' . $login_button . '</div>';
                    }

                    ?>
                </div>

                <br><br>
            </form>

            <form action="authentication.php" class="input-group" id="register" method="POST">
                <input type="text" name="name" class="input-field" placeholder="Name" required>
                <input type="email" name="email" id="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <button class="submit-btn" type="submit" name="register" onclick="return validateEmail()">Register</button>
                <!-- <div class="execute" style="visibility: hidden;"></div> -->
            </form>


        </div>


    </div>


    <script type="text/javascript">
        var loginForm = document.getElementById("login")
        var registerForm = document.getElementById("register")
        var shiftBtn = document.getElementById("btn")
        var mail = document.getElementById("email").value;
        var execute = document.querySelector(".execute");

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

        function validateEmail(e) {
            var regx = /^([a-zA-Z\.-_]+)@([a-z0-9-]+).([a-z]{2,8})$/;
            if (regx.test(mail)) {
                window.open('authentication.php', '_self')
                return true;
            }
            e.preventDefault();
            alert("You have entered an invalid email address!");
            mail.focus();
            return false;
        }
    </script>
</body>

</html>


<?php


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
    $_SESSION['email'] = $email;

    echo "<script>window.open('index.php','_self')</script>";
}


if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    } else {
        echo "<script>alert('Please Enter Valid Email!');</script>";
    }
}

?>