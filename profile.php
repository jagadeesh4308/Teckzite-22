<?php 

include "./includes/connect.php";
include "./includes/header.php";
include "./includes/usrGetBack.php";

?>

<?php

    //If new user Insert to DB
    $useremail = $_SESSION['user_email_address'];
    $username = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
    $tzid = $profileUpdated = '';

    $response = mysqli_query($connection,"SELECT * FROM tzUsrs WHERE usrEmail='$useremail'");

    //User existed
    if(mysqli_num_rows($response) > 0){
        //Fetch the user from DB
        $row = mysqli_fetch_assoc($response);
        $_SESSION['tzID'] = $row["tzID"];
        $profileUpdated = $row["isProfileUpdated"];
        //If all conditions satisfies redirect to home page
        if($profileUpdated){
            header("Location:payment.php");
        }

    }
    else{
        //Generate TZid
        $nOfrows = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM tzUsrs"));
        $nOfrows = $nOfrows + 1;
        $tzid = "TZ".substr(str_repeat(0, 5).$nOfrows, - 5);
        //Usr not existed inserting
        mysqli_query($connection,"INSERT INTO tzUsrs(tzID,usrEmail,usrName) VALUES('$tzid','$useremail','$username')");
        //Fetching
        $row = mysqli_fetch_assoc($response);
        $profileUpdated = $row["isProfileUpdated"];
    }

?>


<?php 

if (isset($_POST['updateProfile'])){
    $state = $_POST['state'];
    $town = $_POST['town'];
    $collegename = $_POST['collegeName'];
    $year = $_POST['year'];
    $branch = $_POST['branch'];
    mysqli_query($connection,"UPDATE tzUsrs SET state = '$state',town = '$town',collegeName = '$collegename',year = '$year',branch = '$branch',isProfileUpdated = '1' WHERE usrEmail='$useremail'");
    header("Location:payment.php");
}

?>

<br> <br>
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <textarea class="form-control heightClass" disabled><?php echo $tzid; ?></textarea>
        </div>
        <br />
        <div class="form-group">
            <input type="text" value="<?php echo $username;?>" disabled>
        </div>
        <br />
        <div class="form-group">
            <input type="text" value="<?php echo $useremail;?>" disabled>
        </div>
        <br>
        <select name="state" class="form-control">
            <option value="" selected disabled>Select State</option>
            <option value="ap">AP</option>
            <option value="telangana">Telangana</option>
        </select>
        <br>
        <input type="text" name="town" class="form-control" placeholder="Town">
        <br>
        <input type="text" name="collegeName" class="form-control" placeholder="College name">
        <br>
        <select name="year" id="" class="form-control">
            <option value="" selected disabled>Select Year</option>
            <option value="e1">E1</option>
            <option value="e2">E2</option>
        </select>
        <br>
        <select name="branch" id="" class="form-control">
            <option value="" selected disabled>Select Branch</option>
            <option value="cse">CSE</option>
            <option value="ece">ECE</option>
        </select>
        <center><input type="submit" class="btn btn-primary" name="updateProfile" value="Update"></input></center>
        <a href='logout.php'>Logout</a>  
    </form>


<?php 
    include "./includes/footer.php";
?>