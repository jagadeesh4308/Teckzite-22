<?php 

include "./includes/getBack.php";

?>

<style>
    .heightClass {
      width: 600px;
      height: 200px;
    }
    .center{
        height: auto !important;
    }
    .eveimage{
      width: 100px;
      height:100px;
    }

    @media (max-width:720px){
        .heightClass{
            width: 400px;
        }
        form{
          width:95%;
          margin: 0 auto;
          overflow-x: hidden;
        }
    }
    @media (max-width:420px){
        .heightClass{
            width: 300px;
        }
    }
</style>


<?php 

  //fetch details
  $query1 = "SELECT * FROM competitions WHERE eveName='$pieces[0]'";
  $done = 0;
  $fetchedAbout = '';   
  $fetchedRules = '';
  $fetchedEvent = '';
  $fetchedimg = '';
  $fetchedfaq = '';
  $fetchedtimeline = '';
  $fetchedcontact = '';
  $fetchedstructure = '';
  $fetchedsponimg = '';
  $response = mysqli_query($connection,$query1);
  if(mysqli_num_rows($response)>0){
      $row = mysqli_fetch_assoc($response);
      $done = 1;
      $fetchedEvent = $row['eveName'];
      $fetchedAbout = $row['about'];
      $fetchedstructure = $row['structure'];
      $fetchedtimeline = $row['timeline'];
      $fetchedfaq = $row['faq'];
      $fetchedRules = $row['rules'];
      $fetchedcontact = $row['contact_info'];
      $fetchedimg = $row['eveImg'];
      $fetchedsponimg = $row['sponImg'];
      $fetchedRegistrations = $row['isRegistrationsOpened'];
  }

?>


<?php

// add content
if (isset($_POST['addEve'])){

    $about = $rules = $structure = $timeline = $faq = $contact = '';
    $about = $_POST['about'];
    $structure = $_POST['structure'];
    $timeline = $_POST['timeline'];
    $faq = $_POST['faq'];
    $rules = $_POST['rules'];
    $contact = $_POST['contact'];
    $eveimg = $_FILES['eveimg']['name'];
    $sponimg = $_FILES['sponimg']['name'];
    $registrations = $_POST['registrations'];
    $upload = 'images/';
    move_uploaded_file($_FILES['eveimg']['tmp_name'],$upload.basename($_FILES['eveimg']['name']));
    move_uploaded_file($_FILES['sponimg']['tmp_name'],$upload.basename($_FILES['sponimg']['name']));

    if($eveimg){
      mysqli_query($connection,"UPDATE competitions SET eveImg = '$eveimg',about = '$about',structure = '$structure',timeline = '$timeline',faq = '$faq',rules = '$rules',contact_info = '$contact',isRegistrationsOpened='$registrations' WHERE eveName='$pieces[0]'");
    }
    if($sponimg){
      mysqli_query($connection,"UPDATE competitions SET about = '$about',structure = '$structure',timeline = '$timeline',faq = '$faq',rules = '$rules',contact_info = '$contact',sponImg = '$sponimg',isRegistrationsOpened='$registrations' WHERE eveName='$pieces[0]'");
    }
    if($eveimg && $sponimg){
      mysqli_query($connection,"UPDATE competitions SET eveImg = '$eveimg',about = '$about',structure = '$structure',timeline = '$timeline',faq = '$faq',rules = '$rules',contact_info = '$contact',sponImg = '$sponimg',isRegistrationsOpened='$registrations' WHERE eveName='$pieces[0]'");
    }
    if(!$eveimg || !$sponimg){
      mysqli_query($connection,"UPDATE competitions SET about = '$about',structure = '$structure',timeline = '$timeline',faq = '$faq',rules = '$rules',contact_info = '$contact',isRegistrationsOpened='$registrations' WHERE eveName='$pieces[0]'");
    }

    echo "<div class='alert alert-warning' role='alert'>Updating....</div>";

    header("refresh: 1; url = dashboard.php");
  
}

?>

<br />
    <center>
      <p style="padding:0 10px;"><?php echo "You adding details for the event <br><b style='text-transform:uppercase;'>".$pieces[0]."</b>";?></p>
    </center>
    <div class="center">
      <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
          <?php 
            if ($fetchedimg){
              echo "<img src='images/$fetchedimg' class='eveimage'>&nbsp;&nbsp;&nbsp;";
              echo "<input type='file' name='eveimg'>";
            }
            else{
              echo "<input type='file' name='eveimg'>";
            }
          ?>
        </div>
        <br>
        <div class="form-group">
          <?php 
            if ($fetchedsponimg){
              echo "<img src='images/$fetchedsponimg' class='eveimage'>&nbsp;&nbsp;&nbsp;";
              echo "<input type='file' name='sponimg'>";
            }
            else{
              echo "<input type='file' name='sponimg'>";
            }
          ?>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="About" name="about" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedAbout; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Structure" name="structure" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedstructure; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Timeline" name="timeline" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedtimeline; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="FAQ's" name="faq" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedfaq; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Rules" name="rules" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedRules; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Contact" name="contact" <?php if($user!='organizer'){echo "disabled";} ?>><?php echo $fetchedcontact; ?></textarea>
        </div>
        <br />
        <?php 
          if($fetchedRegistrations==1){
            echo "Currently registrations opened";
          }
          else{
            echo "Currently registrations closed";
          }
        ?>
        <div class="form-group">
          <input type="radio" name="registrations" value="1" <?php if($fetchedRegistrations==1){echo "checked";} ?>>
          Open         
          <br>
          <input type="radio" name="registrations" value="0" <?php if($fetchedRegistrations==0){echo "checked";} ?>>
          Close
        </div>
        <br>
        <center><input type="submit" class="btn btn-primary" name="addEve" value="Update"></input></center>
      </form>
    </div>
    <br>