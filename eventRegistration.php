<?php 

include "repeats/header.php";
include "includes/connect.php";
include "includes/session_data.php";
include "./includes/profile_updated.php";

$id = $_GET['id'];
$min = $_GET['min'];
$max = $_GET['max'];
$department = $_GET['dept'];
if(!($id && $min && $max)){
    header("Location:events.php");
}

?>

<?php 

if (isset($_POST['register'])){
    $members = $usrid;
    if($min==1 && $max==1){
        mysqli_query($connection,"INSERT INTO eventsRegistrations(eveName,members,regStatus) VALUES('$id' , '$members' , '1' )");
        echo "<div class='alert alert-success' role='success'>Successfully registered explore remaining events....</div>";
        header("refresh: 1; url = events.php");
    } 
    else{
        for($i = 0; $i < count($_POST["members"]); $i++) {
        if($_POST["members"][$i]){
            $members = $members."_".$_POST["members"][$i];
        }
    }
    
        mysqli_query($connection,"INSERT INTO eventsRegistrations(eveName,members,acceptedBy) VALUES('$id' , '$members' , '$usrid' )");
        // echo $members;
        echo "<div class='alert alert-success' role='success'>Successfully registered explore remaining events....</div>";
        header("refresh: 1; url = events.php");
    }
}

?>

<br><br>

<center>
    <form action="#" method="post">
            <?php 
                $count = 1;
                echo "<div class='form-group'><input type='text' placeholder='$usrid' disabled class='form-control'></div>";
                if($max>1){
                    echo "<br><br>";
                    echo "It is a team event it needs to have minimum of $min and maximum of $max members for the team<br><br>";
                    echo "Enter team mates details";
                    for($x=1;$x<$max;$x++){
                        if($count==$min){
                            echo "<div class='form-group'><input type='text' name='members[]' placeholder='Enter TZ ID' class='form-control'></div>";
                        }
                        else{
                            echo "<div class='form-group'><input type='text' name='members[]' placeholder='Enter TZ ID*' class='form-control' required></div>";
                            $count = $count + 1;
                        }
                    }
                }
            ?>
            <br>
            <?php 

                // echo $department;
                // echo $dept;
                if($department==$dept)echo "<input type='submit' value='Register' name='register' class='btn btn-primary'>";
                else{
                    echo "<div class='alert alert-warning' role='alert'>You not belongs to this branch....</div>";
                    header("refresh: 2; url = events.php");
                }
            ?>
    </form>
</center>