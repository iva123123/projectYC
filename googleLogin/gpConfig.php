<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '107150007119-or4272vmvfqe1hpap5j9tqk6c9n2ea35.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'u8ZOPQ5XLrBJjqvYgX-VfH54'; //Google client secret
$redirectURL = 'http://localhost/projectYC/googleLogin'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Exit Festival');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
