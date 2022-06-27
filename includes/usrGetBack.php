<?php 

session_start();
$usr = $_SESSION['user_email_address'];
$usrid = $_SESSION['tzID'];
$dept = $_SESSION['dept'];

if(!$usr){
    header("Location:login.php");
}

?>