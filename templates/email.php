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

    <title>Email Authentication</title>
</head>

<body>

    <h1 class="header"><i class="fab fa-battle-net"></i> Algo Visualization</h1>
    <div class="hero">
        <div class="mail-box ">

            <form action="email.php" method="POST">
                <h3> Please enter your email, You will receive link to reset your password</h3>
                <br>
                <input type="email" name="email" class="input-field" placeholder="Email" id="email" required>
                <button class="submit-btn" type="submit" name="send">Send Mail</button>
                <br>
            </form>

            <h4 style="text-align:center;">Already have an account <a href="authentication.php">Click here</a> to login </h4>

        </div>
    </div>


    <script type="text/javascript">
        var mail = document.getElementById("email").value;

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


if (isset($_POST['send'])) {
    $to_email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "select * from auth where email = '$to_email'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Registered Email ID');</script>";
        echo "<script>window.open('email.php','_self')</script>";
    } else {

        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row['user_id'];
            $name = $row['name'];
        }

        $subject = "Password Reset";
        $body = "Hi, $name. Please Click here to reset your password http://localhost/Algo-Visualization/templates/forgot_password.php?id=$id";
        $sender_mail = "From: abhig0209@gmail.com";

        if (mail($to_email, $subject, $body, $sender_mail)) {
            echo "<script>alert('Password Link Send Please Check Your Mail');</script>";
            echo "<script>window.open('mail_message.html','_self')</script>";
        } else {
            echo "<script>alert('Mail Sending Failed ...');</script>";
        }
    }
}



?>