<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('950076728670-tbp7fq7ihn49c1brb87up5rd6ivrb01p.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('SMSSH5r3_y3-tnInxB9n1ULK');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Algo-Visualization/templates/authentication.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');
