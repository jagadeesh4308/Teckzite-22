<?php 

    include "repeats/header.php";
    include "includes/connect.php";
    include "includes/session_data.php";

    $workshop = $_GET['id'];

    if(!$workshop){
        header("Location:workshops.php");
    }
    echo "<section id='main_container'>";

?>


<?php 

$found = 0;

$response = mysqli_query($connection,"SELECT * FROM workshopsRegistrations WHERE wName='$workshop' AND tzID='$usrid'");
if(mysqli_num_rows($response)>0){
    $found = 1;
}

?>



<?php 

$response = mysqli_query($connection,"SELECT * FROM workshops WHERE workshopName='$workshop'");
if(mysqli_num_rows($response)>0){

    $row = mysqli_fetch_assoc($response);
    $fetchedEvent = $row['workshopName'];
    $fetchedAbout = $row['about'];
    $fetchedstructure = $row['structure'];
    // $fetchedtimeline = $row['timeline'];
    $fetchedcontact = $row['contact'];
    $fetchedimg = $row['workshopImg'];
    $department = $row['workshopDept'];



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
                            "?>

                        <?php 
                            if($found==1){
                                echo "You already registered";
                            }
                            else{
                                echo "<button id='register'><a href='workshopRegistration.php?id=$fetchedEvent'>REGISTER</a></button>";
                            }
                            echo "<button id='prblemstmt'>PROBLEM STATEMENT</button>
                        </div>
                    </div>
                </section>
                <section id='etwo'>
                    <div id='t1'>
                        <h1>Date</h1>
                        <span>timeline</span>
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
                <section id='efive'>
                    <h1>Contact</h1>
                    <p>$fetchedcontact</p>
                </section>
            </main>
            </section>";

}
include "repeats/footer.php";

?>