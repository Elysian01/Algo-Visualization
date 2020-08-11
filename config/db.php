<?php 

        $con = mysqli_connect("localhost","root","","algorithms");
      
        if (mysqli_connect_errno()) {
                echo "Failed to connect to MySql " . mysqli_connect_error();
        }
?>