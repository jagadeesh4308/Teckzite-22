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
  $query1 = "SELECT * FROM workshops WHERE workshopName='$pieces[0]'";
  $done = 0;
  $fetchedAbout = '';   
  $fetchedRules = '';
  $fetchedEvent = '';
  $fetchedStructure = '';
  $fetchedimg = '';
  $fetchedcontact = '';
  $response = mysqli_query($connection,$query1);
  if(mysqli_num_rows($response)>0){
      $row = mysqli_fetch_assoc($response);
      $done = 1;
      $fetchedEvent = $row['workshopName'];
      $fetchedDept = $row['workshopDept'];
      $fetchedAbout = $row['about'];
      $fetchedcontact = $row['contact'];
      $fetchedStructure = $row['structure'];
      $fetchedimg = $row['workshopImg'];
      $fetchedRegistrations = $row['isRegistrationsOpened'];
  }

?>


<?php

// add content
if (isset($_POST['addWorkshop'])){

    $about = $rules = $structure = $timeline = $faq = $contact = $dept = '' ;
    $about = $_POST['about'];
    $contact = $_POST['contact'];
    $dept = $_POST['dept'];
    $structure = $_POST['structure'];
    $workshopimg = $_FILES['workshopimg']['name'];
    $registrations = $_POST['registrations'];
    $upload = 'images/';

    if($workshopimg){
      move_uploaded_file($_FILES['workshopimg']['tmp_name'],$upload.basename($_FILES['workshopimg']['name']));
      mysqli_query($connection,"UPDATE workshops SET workshopDept = '$dept',about = '$about',workshopimg = '$workshopimg',structure = '$structure',isRegistrationsOpened = '$registrations',contact = '$contact' WHERE workshops.workshopName='$pieces[0]'");
    }
    else{
      mysqli_query($connection,"UPDATE workshops SET workshopDept = '$dept',about = '$about',structure = '$structure',isRegistrationsOpened = '$registrations',contact = '$contact' WHERE workshops.workshopName='$pieces[0]'");
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
              echo "<input type='file' name='workshopimg'>";
            }
            else{
              echo "<input type='file' name='workshopimg'>";
            }
          ?>
        </div>
        <br>
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
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="About" name="about" <?php if($user!='w_organizer'){echo "disabled";} ?>><?php echo $fetchedAbout; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Structure" name="structure" <?php if($user!='w_organizer'){echo "disabled";} ?>><?php echo $fetchedStructure; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Department" name="dept" <?php if($user!='w_organizer'){echo "disabled";} ?>><?php echo $fetchedDept; ?></textarea>
        </div>
        <br />
        <div class="form-group">
          <textarea class="form-control heightClass" placeholder="Contact" name="contact" <?php if($user!='w_organizer'){echo "disabled";} ?>><?php echo $fetchedcontact; ?></textarea>
        </div>
        <br />
        <center><input type="submit" class="btn btn-primary" name="addWorkshop" value="Update"></input></center>
      </form>
    </div>
    <br>