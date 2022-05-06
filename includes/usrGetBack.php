<?php 

session_start();
$usr = $_SESSION['user_email_address'];
$usrid = $_SESSION['tzID'];

if(!$usr){
    header("Location:index.php");
}

?>