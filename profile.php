<?php 

    include "repeats/header.php";
    include "includes/connect.php";
    include "./includes/usrGetBack.php";
?>


<section id="as">
    <div id="as1">
        <h1>Profile</h1>
    </div>
    <a href="logout.php">logout</a>
    <br>
    <div id="as2">

    <?php 
            
        $useremail = $_SESSION['user_email_address'];
        $username = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
        $tzID = $_SESSION['tzID'];
        $profilePic = $_SESSION['user_image'];

        echo "<img src='$profilePic' alt='profile_pic'>
            <div id='pinfo'>
            
                <h1 id='tzid'>$tzID</h1>
                <h1 id='uname'>$username</h1>
                <h1 id='umail'>$useremail</h1>";
            ?>
        </div>
    </div>
</section>
<hr id="line">
<section id="feed">
    <div id="regevents">
        <div id="eh">REGISTERED<div id="ehi">EVENTS</div></div>
    </div> 
    <div id="regwkps">
        <div id="eh">REGISTERED<div id="ehi">WORKSHOPS</div></div>
    </div>
</section>