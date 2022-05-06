<?php 

include "./includes/header.php";
include "./includes/connect.php";

?>

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

$response = mysqli_query($connection,"SELECT * FROM competitions WHERE eveName='$eve'");
if(mysqli_num_rows($response)>0){
    $row = mysqli_fetch_assoc($response);
    echo "<div class='row'";
    $fetchedEvent = $row['eveName'];
    $fetchedAbout = $row['about'];
    $fetchedstructure = $row['structure'];
    $fetchedtimeline = $row['timeline'];
    $fetchedfaq = $row['faq'];
    $fetchedRules = $row['rules'];
    $fetchedcontact = $row['contact_info'];
    $fetchedimg = $row['eveImg'];
    $fetchedsponimg = $row['sponImg'];
    $min = $row['minTeam'];
    $max = $row['maxTeam'];

    echo "<img src='images/$fetchedimg'>$fetchedEvent<br><a href='eventRegistration.php?id=$fetchedEvent&min=$min&max=$max'>Register</a>";
    
    echo "</div>";
    
}

?>


