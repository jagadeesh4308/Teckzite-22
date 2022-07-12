<?php 

include "usrGetBack.php";
include "connect.php";

$response = mysqli_query($connection,"SELECT * FROM tzUsrs WHERE usrEmail='$usr'");

if(mysqli_num_rows($response)>0){
    $row = mysqli_fetch_assoc($response);

    $profile = $row['isProfileUpdated'];

    if(!$profile){
        echo "<div class='alert alert-warning' role='warning'>Please update profile....</div>";
        header("refresh: 2; url = registration.php");
    }
}


?>