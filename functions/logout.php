<?php

session_start();

session_destroy();

echo "<script>window.open('../templates/index.php','_self')</script>";
