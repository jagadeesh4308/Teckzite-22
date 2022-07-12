<?php 
    include "repeats/header.php";
    include "includes/connect.php";
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

<section id='main_container'>

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
                    <option value="" selected disabled>Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
                <input type="text" name="town"  placeholder="Town">
            </div>
            <input type="text" name="collegeName"  placeholder="College name">
            <div id="gp2">
                <select name="year" id="" >
                    <option value="" selected disabled>Select Year</option>
                    <option value="p1">PUC 1</option>
                    <option value="p2">PUC 2</option>
                    <option value="e1">E1</option>
                    <option value="e2">E2</option>
                    <option value="e3">E3</option>
                    <option value="e4">E4</option>
                </select>
                <select name="branch" id="" >
                    <option value="" selected disabled>Select Branch</option>
                    <option value="puc">PUC</option>
                    <option value="cse">CSE</option>
                    <option value="ece">ECE</option>
                    <option value="eee">EEE</option>
                    <option value="mech">MECH</option>
                    <option value="civil">CIVIL</option>
                    <option value="mme">MME</option>
                    <option value="chem">CHEM</option>
                </select>
            </div>
            <input type="submit" id='rsubmit' name="updateProfile" value="Update"></input>
    </form>
</section>

<?php
    include "repeats/footer.php";
?>