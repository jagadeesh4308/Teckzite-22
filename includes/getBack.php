<?php 

session_start();
$user = $_SESSION['user'];
$email = $_SESSION['email'];
$usernameOriginal = $_SESSION['name'];
$pieces = explode("@",$usernameOriginal);

if(!$user){
    header("Location:index.php");
}

?>