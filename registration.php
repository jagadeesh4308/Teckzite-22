<?php 

include "./includes/connect.php";
include "./repeats/header.php";
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
        $_SESSION['tzID'] = $tzid = $row["tzID"];
        $_SESSION['dept'] = $row["branch"];
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
<h1 id="rhead">REGISTRATION</h1>
    <form id="rform" method="post" action="#" enctype="multipart/form-data">
        <!-- -------------- -->
        <textarea disabled><?php echo $tzid; ?></textarea>
        <!-- -------------- -->
        <br>
            <input type="text" value="<?php echo $username;?>" disabled>
            <input type="text" value="<?php echo $useremail;?>" disabled>    
            <div id="gp1">
                <select name="state" >
                    <option value="" selected>Select State</option>
                    <option value="ap">AP</option>
                    <option value="telangana">Telangana</option>
                </select>
                <input type="text" name="town"  placeholder="Town">
            </div>
            <input type="text" name="collegeName"  placeholder="College name">
            <div id="gp2">
                <select name="year" id="" >
                    <option value="" selected disabled>Select Year</option>
                    <option value="e1">E1</option>
                    <option value="e2">E2</option>
                </select>
                <select name="branch" id="" >
                    <option value="" selected disabled>Select Branch</option>
                    <option value="cse">CSE</option>
                    <option value="ece">ECE</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="updateProfile" value="Update"></input>
    </form>


<?php 
    include "./includes/admin-footer.php";
?>