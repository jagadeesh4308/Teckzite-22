<?php 

include "repeats/header.php";
include "includes/connect.php";
include "./includes/usrGetBack.php";

$id = $_GET['id'];
$department = $_GET['dept'];
if(!$id ){
    header("Location:workshops.php");
}

$tzID = $_SESSION['tzID'];
$email = $_SESSION['user_email_address'];


?>

<?php 

mysqli_query($connection,"INSERT INTO workshopsRegistrations(wName,tzID,usrEmail) VALUES('$id' , '$tzID' , '$email' )");
echo "<div class='alert alert-success' role='success'>Successfully registered explore remaining workshops....</div>";
header("refresh: 2; url = workshops.php");

?>