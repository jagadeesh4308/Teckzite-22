<?php 

include "./includes/admin-header.php";
include "./includes/connect.php";

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<style>
    .row{
        display:flex;
        flex-wrap:wrap;
    }
    .row img{
        width:100px;
        height:100px;
    }
   
</style>

<?php 


$fetchedEvent = $min = $max = '';
$eve = $_GET['id'];

if(!$eve){
    header("Location:allEvents.php");
}



if (isset($_POST['opinionSubmit'])){
    if($_POST['opinion']=='1'){
        $acceptance = $acceptance."_".$usr;
        if(count($pieces)==count($pieces2)-1){
            mysqli_query($connection,"UPDATE eventsRegistrations SET acceptedBy = '$acceptance',regStatus=1 WHERE eventsRegistrations.sno = $count");
        }   
        else{
            mysqli_query($connection,"UPDATE eventsRegistrations SET acceptedBy = '$acceptance' WHERE eventsRegistrations.sno = $count");
        }
    }
    else{
        mysqli_query($connection,"UPDATE eventsRegistrations SET rejectedBy = '$usr',regStatus=0 WHERE eventsRegistrations.sno = $count");
    }
    
    header("Location:eventDetails.php");
}


?>




