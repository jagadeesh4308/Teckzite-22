<?php 

$connection = mysqli_connect("localhost","root","","teckzite22");
if(!$connection){
   die("Connection failed:".mysqli_connect_error()); 
}
// echo "Connected successfully";

?>