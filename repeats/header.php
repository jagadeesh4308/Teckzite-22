<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teckzite'22</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $('.menu').click(function(){
          $('.nav_list').toggleClass('show')
        })
      })
    </script>
  </head>
  <body>
    <nav class="nav_bar">
      <div class="nav_container">
        <div class="nav_row">
          <div class="nav_row_half">
            <a href="#" class="nav_logo"><img src="./images/logo.png" alt=""></a>
            <ul class="nav_list">
              <li class="nav_list_item"><a href="index.php" class="nav_link">Home</a></li>
              <li class="nav_list_item"><a href="events.php" class="nav_link">Events</a></li>
              <li class="nav_list_item"><a href="workshops.php" class="nav_link">Workshops</a></li>
              <li class="nav_list_item"><a href="#" class="nav_link">About</a></li>
              <li class="nav_list_item"><a href="#" class="nav_link">Contact</a></li>
            </ul>
            <ul class="menu">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
          <div class="nav_row_half nav_row_svg">
            <svg width="1050" height="34" viewBox="0 0 956.16 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g filter="url(#filter0_d_535_1114)">
              <path d="m4 25H198.42C206.903 25 215.247 22.8417 222.666 18.7281L243.328 7.27186C250.747 3.15832 259.09 1 267.573 1H1305" stroke="url(#paint0_linear_535_1114)" stroke-opacity="1" stroke-width="2" shape-rendering="crispEdges"></path></g>
              <defs>
                <filter id="filter0_d_535_1114" x="0" y="0" width="1309" height="34" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                <feOffset dy="4"></feOffset>
                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                <feComposite in2="hardAlpha" operator="out"></feComposite>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_535_1114"></feBlend>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_535_1114" result="shape"></feBlend>
              </filter>
              <linearGradient id="paint0_linear_535_1114" x1="-389.5" y1="25" x2="1367.5" y2="29.4994" gradientUnits="userSpaceOnUse">
                <stop stop-color="#19D2A6"></stop>
                <stop offset="0.0001" stop-color="#19D2A6"></stop>
                <stop offset="0.9999" stop-color="#19D2A6"></stop>
                <stop offset="1" stop-color="#19D2A6"></stop>
              </linearGradient>
            </defs>
            </svg>
          </div>
        </div>


        <?php

            //index.php

            //Include Configuration File
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
            $google_client->setRedirectUri('http://localhost/adminUsrRegistrations/events.php');

            // to get the email and profile 
            $google_client->addScope('email');

            $google_client->addScope('profile');

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
              $login_button = '<a href="'.$google_client->createAuthUrl().'" class="nav_login">LOGIN</a>';
           }     

           
           $profile_button = '<a href="profile.php" class="nav_login">PROFILE</a>';

        ?>

        <div class="nav_row">
          <?php 
            if($login_button==''){
                 echo $profile_button;
            }
            else{
                echo $login_button;
            }
          ?>
        </div>
      </div>
    </nav>