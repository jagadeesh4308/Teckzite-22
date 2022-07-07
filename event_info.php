<?php 

    include "repeats/header.php";
    include "includes/connect.php";

    $eve = $_GET['id'];

    if(!$eve){
        header("Location:events.php");
    }


?>

<?php 

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



    // echo $fetchedEvent;

    // echo $status;


    echo "<main id='emain'>
                <section id='eone'>
                    <div id='o1'>
                        <img src='images/$fetchedimg' alt='event_image'>
                    </div>
                    <div id='o2'>
                        <span style='color:#ffffff;font-size:10px;'>From department of $department</span>
                        <h1>$fetchedEvent</h1>
                        <p>$fetchedAbout</p>
                        <div id='o2buttons'>
                            <button id='register'>REGISTER</button>
                            <button id='prblemstmt'>PROBLEM STATEMENT</button>
                        </div>
                    </div>
                </section>
                <section id='etwo'>
                    <div id='t1'>
                        <h1>Date</h1>
                        <span>$fetchedtimeline</span>
                    </div>
                    <div id='t2'></div>
                    <div id='t3'>
                        <h1>Prize Money</h1>
                        <span>Prizes Worth INR 20,000</span>
                    </div>
                </section>
                <section id='efour'>
                    <h1>Procedure</h1>
                    <p>$fetchedstructure</p>
                </section>
                <section id='ethree'>
                    <h1>Rules</h1>
                    <p>$fetchedRules</p>
                </section>
                <section id='efive'>
                    <h1>Contact</h1>
                    <p>$fetchedcontact</p>
                </section>
            </main>";


    // if($status==0 || $status==-1){
    //     if($department == $_SESSION['dept'])
    //         echo "<a href='eventRegistration.php?id=$fetchedEvent&min=$min&max=$max&dept=$department'>Register</a>";
    // }
    // if($status==1){
    //     echo "You already registered";
    // }
    // if($found2==-1 && $status!=1 && $status!=0 && $usr && ($department == $_SESSION['dept']) && $found!=-1){
    //     echo "Team created by $token";
    //     echo "<form action='#' method='post'>
    //         Accept
    //         <input type='radio' name='opinion' required value='1'>
    //         Reject
    //         <input type='radio' name='opinion' required value='0'>
    //         <input type='submit' name='opinionSubmit'>
    //     </form>";
    // }
    // if($found2!=-1 && $status==100){
    //     if($token==$usr)
    //         echo "You created team and waiting for confirmation of other team members";
    //     else{
    //         echo "Created by $token";
    //         echo "You are being collaberated and waiting for confirmation";
    //     }
    // }

    // echo $status;
    
}

?>



