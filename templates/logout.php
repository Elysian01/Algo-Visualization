<?php
include('google_config.php');

session_start();


$google_client->revokeToken();

session_destroy();

echo "<script>window.open('../templates/index.php','_self')</script>";
