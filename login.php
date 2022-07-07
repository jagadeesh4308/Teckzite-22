<!-- 67978986064-7afouo7pf5qpcupkd9kcertdfb43v37m.apps.googleusercontent.com -->
<!-- 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 -->

<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('67978986064-7afouo7pf5qpcupkd9kcertdfb43v37m.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/adminUsrRegistrations/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');



//index.php

//Include Configuration File
// include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

//  $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
  $google_client->createAuthUrl();

}

else{
    header("Location: registration.php");
}




?>



