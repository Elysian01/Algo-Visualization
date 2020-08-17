<?php
include("../functions/display_functions.php");
include("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../css/homepage.css">
     <link rel="icon" href="../images/logo.png">
     <title>Invalid Access</title>
</head>

<body>

     <?php display_header(); ?>

     <br>
     <div class="container">
          <h1>Please Login First !</h1>
          <br>
          <button class="btn-primary btn-hover mr-50"><a href="./authentication.php">Login</a></button>
          <button class="btn-dark btn-hover"><a href="../index.php">Back to Homepage <i class="fa fa-arrow-right"></i></a></button>
     </div>



</body>

</html>