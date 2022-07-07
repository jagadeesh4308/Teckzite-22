<?php 

include "./includes/admin-header.php";
include "./includes/connect.php";

?>

<?php 

$response = mysqli_query($connection,"SELECT * FROM competitions");
if(mysqli_num_rows($response)>0){
    echo "<div class='row'";
    while($row = mysqli_fetch_assoc($response)){
        $fetchedEvent = $row['eveName'];
        $fetchedDept = $row['eveDepartment'];
        $fetchedimg = $row['eveImg'];

        echo "<img src='images/$fetchedimg'>$fetchedEvent<br><a href='eventDetails.php?id=$fetchedEvent'>View</a>";
    }
    echo "</div>";
}

?>

<?php 

include "./includes/admin-footer.php";

?>