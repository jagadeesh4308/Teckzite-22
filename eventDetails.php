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

$found = -1;
$found2 = -1;
$status = -1;
$token = '';
$count = 0;
session_start();
$usr = $_SESSION['tzID'];
if($usr){
    $res = mysqli_query($connection,"SELECT * FROM eventsRegistrations WHERE eveName='$eve'");
    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $count=$count+1;
            $members = $row['members'];
            $pieces = explode("_",$members);
            if(count($pieces)>1){
                for($i=0;$i<count($pieces);$i++){
                    if($pieces[$i]==$usr){
                        $found=$i;
                        break;
                    }
                }
            }
            if($found!=-1){
                $acceptance = $row['acceptedBy'];
                $pieces2 = explode("_",$acceptance);
                for($i=0;$i<count($pieces2);$i++){
                    if($usr==$pieces2[$i]){
                        $found2 = 1;
                    }
                }
                $token = $pieces2[0];
                $status = $row['regStatus'];
                break;
            }
        }
    }
}
else{
    //No user
}


$response = mysqli_query($connection,"SELECT * FROM competitions WHERE eveName='$eve'");
if(mysqli_num_rows($response)>0){

    $row = mysqli_fetch_assoc($response);
    $fetchedEvent = $row['eveName'];
    $fetchedAbout = $row['about'];
    $fetchedstructure = $row['structure'];
    $fetchedtimeline = $row['timeline'];
    $fetchedfaq = $row['faq'];
    $fetchedRules = $row['rules'];
    $fetchedcontact = $row['contact_info'];
    $fetchedimg = $row['eveImg'];
    $fetchedsponimg = $row['sponImg'];
    $department = $row['eveDepartment'];
    $min = $row['minTeam'];
    $max = $row['maxTeam'];

    echo $fetchedEvent;

    // echo $status;
    if($status==0 || $status==-1){
        if($department == $_SESSION['dept'])
            echo "<a href='eventRegistration.php?id=$fetchedEvent&min=$min&max=$max&dept=$department'>Register</a>";
    }
    if($status==1){
        echo "You already registered";
    }
    if($found2==-1 && $status!=1 && $status!=0 && $usr && ($department == $_SESSION['dept']) && $found!=-1){
        echo "Team created by $token";
        echo "<form action='#' method='post'>
            Accept
            <input type='radio' name='opinion' required value='1'>
            Reject
            <input type='radio' name='opinion' required value='0'>
            <input type='submit' name='opinionSubmit'>
        </form>";
    }
    if($found2!=-1 && $status==100){
        if($token==$usr)
            echo "You created team and waiting for confirmation of other team members";
        else{
            echo "Created by $token";
            echo "You are being collaberated and waiting for confirmation";
        }
    }

    // echo $status;
    
}

echo "<a href='logout.php'>logout</a>";

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




