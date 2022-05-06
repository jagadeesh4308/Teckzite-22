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

$response = mysqli_query($connection,"SELECT * FROM competitions");
if(mysqli_num_rows($response)>0){
    echo "<div class='row'";
    while($row = mysqli_fetch_assoc($response)){
        $fetchedEvent = $row['eveName'];
        // $fetchedAbout = $row['about'];
        // $fetchedstructure = $row['structure'];
        // $fetchedtimeline = $row['timeline'];
        // $fetchedfaq = $row['faq'];
        // $fetchedRules = $row['rules'];
        // $fetchedcontact = $row['contact_info'];
        $fetchedimg = $row['eveImg'];
        // $fetchedsponimg = $row['sponImg'];

        echo "<img src='images/$fetchedimg'>$fetchedEvent<br><a href='eventDetails.php?id=$fetchedEvent'>View</a>";
    }
    echo "</div>";
}

?>

<?php 

include "./includes/footer.php";

?>