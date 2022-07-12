<?php 

include "session_data.php";

if(!$usr){
    echo "<div class='alert alert-warning' role='warning'>Please login....</div>";
    header("refresh: 1; url = index.php");
}

?>